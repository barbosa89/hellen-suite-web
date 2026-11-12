<?php

declare(strict_types=1);

it('renders the downloads page and its frequently asked questions', function (): void {
    $response = $this->get('/downloads');
    $content = html_entity_decode($response->content, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $response->assertOk();

    expect($content)->toContain(
        'lang="en"',
        'Frequently asked questions',
        'Windows x64',
        'other operating systems are not yet available',
        'The data is stored in a local database on your computer.',
        'All features work offline except reporting guest information to regulatory authorities.',
        'You can manually create a backup from Hellen Suite settings',
        'Download the Windows installer and run it to install Hellen Suite.'
    )
        ->and($content)->not->toContain('3.0.0')
        ->and(substr_count($content, '<details class="downloads-faq-item">'))->toBe(6);
});
