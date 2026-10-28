# Changelog

All notable changes to this project will be documented in this file.

## 1.0.1 - 2026-10-28

Tests now load the package migrations with jeffersongoncalves/pest-plugin-database-migrations, in the order declared by the service provider, instead of copying the .php.stub files by hand. No runtime changes.

## 1.0.0 - 2026-08-29

Initial release: translatable, orderable "how it works" steps for Laravel, powered by spatie/laravel-translatable.

## [Unreleased]

### Added

- Initial release: `Step` model with translatable title/description fields, `active()`/`ordered()` scopes, migrations, config, and tests
