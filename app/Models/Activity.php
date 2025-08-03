<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activity extends Model
{
    protected $fillable = [
        'name',
        'parent_id',
        'level'
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class);
    }

    // Ограниечение вложенности
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if ($model->parent_id) {
                $parent = self::find($model->parent_id);
                if ($parent && $parent->level >= 3) {
                    throw new \Exception('Максимальный уровень вложенности — 3');
                }
                $model->level = $parent->level + 1;
            }
        });
    }
}
