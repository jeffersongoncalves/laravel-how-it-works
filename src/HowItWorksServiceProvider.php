<?php

namespace JeffersonGoncalves\HowItWorks;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\Translatable\Translatable;

class HowItWorksServiceProvider extends PackageServiceProvider
{
    public static string $name = 'how-it-works';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile()
            ->hasMigrations([
                'create_how_it_works_steps_table',
            ]);
    }

    public function packageBooted(): void
    {
        app(Translatable::class)->fallback(
            fallbackLocale: config('app.fallback_locale', 'en'),
            fallbackAny: true,
        );
    }
}
