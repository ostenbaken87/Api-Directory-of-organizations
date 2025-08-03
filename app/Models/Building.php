<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building extends Model
{
    use HasFactory;

    protected $fillable = ['address','latitude','longitude'];

    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }
}
