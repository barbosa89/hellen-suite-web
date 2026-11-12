<?php

declare(strict_types=1);

namespace App\Services;

use Arix\Exceptions\CoreRuntimeException;
use Arix\Facades\Storage;
use Arix\Http\Client\Http;
use DateTimeImmutable;
use DateTimeZone;
use Throwable;

use function count;
use function is_array;
use function is_bool;
use function is_int;
use function is_string;

class Releases
{
    private const string PATH = 'releases/releases.json';

    private const string API = 'https://api.github.com/repos/barbosa89/hellen-suite/releases';

    public function sync(): void
    {
        $releases = [];

        for ($page = 1; $page <= 20; $page++) {
            $items = $this->fetchPage($page);

            foreach ($items as $item) {
                $release = $this->normalize($item);

                if ($release !== null) {
                    $releases[$release['id']] = $release;
                }
            }

            if (count($items) < 20) {
                $this->save($releases);

                return;
            }
        }

        throw new CoreRuntimeException('GitHub releases pagination limit exceeded.');
    }

    public function read(): array
    {
        try {
            if (! Storage::has(self::PATH)) {
                return [];
            }

            $data = json_decode(Storage::get(self::PATH), true, 512, JSON_THROW_ON_ERROR);

            $result = [];

            foreach ($data['releases'] as $item) {
                $release = $this->normalize($item);

                if ($release === null) {
                    return [];
                }

                $result[] = $release;
            }

            return $result;
        } catch (Throwable) {
            return [];
        }
    }

    private function fetchPage(int $page): array
    {
        $client = $this->getClient();

        try {
            $response = $client->get(self::API, ['per_page' => 20, 'page' => $page]);
        } catch (Throwable $exception) {
            throw new CoreRuntimeException('GitHub releases request failed.', previous: $exception);
        }

        if (! $response->successful()) {
            throw new CoreRuntimeException('GitHub releases request failed with status ' . $response->status());
        }

        try {
            $items = $response->json();
        } catch (Throwable $exception) {
            throw new CoreRuntimeException('GitHub releases response is invalid JSON.', previous: $exception);
        }

        if (! is_array($items) || ! array_is_list($items) || count($items) > 20) {
            throw new CoreRuntimeException('GitHub releases response is invalid.');
        }

        return $items;
    }

    private function save(array $releases): void
    {
        usort($releases, static fn (array $a, array $b): int => strcmp($b['published_at'], $a['published_at']));

        $data = ['schema_version' => 1, 'last_successful_sync' => (new DateTimeImmutable('now', new DateTimeZone('UTC')))->format(DATE_ATOM), 'releases' => $releases];

        try {
            Storage::put(self::PATH, json_encode($data, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES));
        } catch (Throwable $exception) {
            throw new CoreRuntimeException('Unable to save the releases catalog.', previous: $exception);
        }
    }

    private function normalize(mixed $item): array|null
    {
        if (! is_array($item) || ! is_bool($item['draft'] ?? null) || ! is_bool($item['prerelease'] ?? null)) {
            throw new CoreRuntimeException('GitHub release data is invalid.');
        }

        if ($item['draft'] || $item['prerelease']) {
            return null;
        }

        if (! is_int($item['id'] ?? null) || ! is_string($item['tag_name'] ?? null) || $item['tag_name'] === '' || ! is_string($item['published_at'] ?? null) || strtotime($item['published_at']) === false || ! is_array($item['assets'] ?? null) || ! array_is_list($item['assets']) || ! $this->validUrl($item['html_url'] ?? null, '/barbosa89/hellen-suite/releases/tag/')) {
            throw new CoreRuntimeException('GitHub release data is invalid.');
        }

        $assets = $this->normalizeAssets($item['assets']);

        if ($assets === []) {
            return null;
        }

        return ['id' => $item['id'], 'tag_name' => $item['tag_name'], 'name' => is_string($item['name'] ?? null) && $item['name'] !== '' ? $item['name'] : $item['tag_name'], 'published_at' => $item['published_at'], 'draft' => false, 'prerelease' => false, 'html_url' => $item['html_url'], 'assets' => $assets];
    }

    private function normalizeAssets(array $items): array
    {
        $assets = [];

        foreach ($items as $asset) {
            if (! is_array($asset) || ! is_string($asset['name'] ?? null) || ! is_string($asset['state'] ?? null)) {
                throw new CoreRuntimeException('GitHub release asset is invalid.');
            }

            if ($asset['state'] !== 'uploaded' || ! str_ends_with(strtolower($asset['name']), '-setup.exe')) {
                continue;
            }

            if (! $this->githubDataIsValid($asset)) {
                throw new CoreRuntimeException('GitHub installer data is invalid.');
            }

            $digest = $asset['digest'] ?? null;
            $assets[] = [
                'id' => $asset['id'],
                'name' => $asset['name'],
                'state' => 'uploaded',
                'size' => $asset['size'],
                'browser_download_url' => $asset['browser_download_url'],
                'digest' => is_string($digest) && preg_match('/^sha256:[a-f0-9]{64}$/', $digest) ? $digest : null,
            ];
        }

        return $assets;
    }

    private function githubDataIsValid(array $asset): bool
    {
        return is_int($asset['id'] ?? null)
        && is_int($asset['size'] ?? null)
        && $asset['size'] >= 0
        && $this->validUrl($asset['browser_download_url'] ?? null, '/barbosa89/hellen-suite/releases/download/');
    }

    private function validUrl(mixed $url, string $prefix): bool
    {
        if (! is_string($url) || filter_var($url, FILTER_VALIDATE_URL) === false) {
            return false;
        }

        $parts = parse_url($url);

        if (! is_array($parts)) {
            return false;
        }

        $path = rawurldecode($parts['path'] ?? '');

        if (preg_match('~(?:^|/)\.{1,2}(?:/|$)|[\\\\\x00-\x1f\x7f]~', $path)) {
            return false;
        }

        return ($parts['scheme'] ?? '') === 'https'
            && ($parts['host'] ?? '') === 'github.com'
            && ! isset($parts['user'])
            && ! isset($parts['port'])
            && ! isset($parts['query'])
            && ! isset($parts['fragment'])
            && str_starts_with($parts['path'] ?? '', $prefix);
    }

    private function getClient(): Http
    {
        return Http::create()
            ->withAllowedHosts(['api.github.com'])
            ->withTimeout(15)
            ->withHeaders([
                'Accept' => 'application/vnd.github+json',
                'X-GitHub-Api-Version' => '2022-11-28',
                'User-Agent' => 'Hellen-Suite-Website',
            ]);
    }
}
