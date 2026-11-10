<?php

declare(strict_types=1);

it('introduces Hellen Suite and links to its desktop releases', function (): void {
    $this->get('/')
        ->assertOk()
        ->assertSee('Hellen Suite')
        ->assertSee('under development')
        ->assertSee('https://github.com/barbosa89/hellen-suite/releases');
});
