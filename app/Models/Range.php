<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Range extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'banner_path',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
