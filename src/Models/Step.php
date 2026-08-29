<?php

namespace JeffersonGoncalves\HowItWorks\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use JeffersonGoncalves\HowItWorks\Database\Factories\StepFactory;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property string|null $icon
 * @property array<string, string> $title
 * @property array<string, string> $description
 * @property int $order
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Step extends Model
{
    use HasFactory;
    use HasTranslations;

    public array $translatable = [
        'title',
        'description',
    ];

    protected $fillable = [
        'icon',
        'title',
        'description',
        'order',
        'is_active',
    ];

    protected $casts = [
        'order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function getTable(): string
    {
        return config('how-it-works.table_names.steps', parent::getTable());
    }

    protected static function newFactory(): StepFactory
    {
        return StepFactory::new();
    }

    /** @param Builder<static> $query */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /** @param Builder<static> $query */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order');
    }
}
