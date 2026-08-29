<?php

use Illuminate\Support\Facades\Schema;

it('registers the config file', function () {
    expect(config('how-it-works.table_names.steps'))->toBe('how_it_works_steps');
});

it('registers the migrations and creates the tables', function () {
    expect(Schema::hasTable('how_it_works_steps'))->toBeTrue();
});
