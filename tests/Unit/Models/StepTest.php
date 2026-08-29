<?php

use JeffersonGoncalves\HowItWorks\Models\Step;

it('stores and retrieves translated title and description per locale', function () {
    $step = Step::factory()->create([
        'title' => ['en' => 'Create an account', 'pt_BR' => 'Crie uma conta'],
        'description' => ['en' => 'Sign up in seconds.', 'pt_BR' => 'Cadastre-se em segundos.'],
    ]);

    expect($step->getTranslation('title', 'en'))->toBe('Create an account')
        ->and($step->getTranslation('title', 'pt_BR'))->toBe('Crie uma conta')
        ->and($step->getTranslation('description', 'pt_BR'))->toBe('Cadastre-se em segundos.');
});

it('falls back to the fallback locale when a translation is missing', function () {
    config(['app.fallback_locale' => 'en']);

    $step = Step::factory()->create([
        'title' => ['en' => 'Create an account'],
    ]);

    expect($step->getTranslation('title', 'pt_BR'))->toBe('Create an account');
});

it('scopes active steps', function () {
    Step::factory()->create(['is_active' => true]);
    Step::factory()->inactive()->create();

    expect(Step::active()->count())->toBe(1);
});

it('scopes steps ordered by the order column', function () {
    $second = Step::factory()->create(['order' => 2]);
    $first = Step::factory()->create(['order' => 1]);

    expect(Step::ordered()->pluck('id')->all())->toBe([$first->id, $second->id]);
});
