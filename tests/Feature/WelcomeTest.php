<?php

declare(strict_types=1);

it('links both download calls to action to the downloads page', function (): void {
    $response = $this->get('/');
    $content = html_entity_decode($response->content, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $response->assertOk();
    expect($content)->toContain('View downloads')
        ->and(preg_match_all('~class="button button-(?:primary|dark)" href="[^"]*/downloads"~', $content))->toBe(2)
        ->and($content)->toMatch('~class="nav-download" href="[^"]*/downloads"~')
        ->and($content)->not->toContain('#desktop')
        ->and($content)->not->toContain('id="desktop"')
        ->and($content)->not->toContain('https://github.com/barbosa89/hellen-suite/releases');
});
