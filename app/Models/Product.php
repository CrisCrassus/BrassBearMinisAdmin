<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Cast\String_;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'identifier',
        'price',
        'features',
        'keywords',
        'range_id',
        'is_featured',
        'wargear',
        'ebay_link',
        'unit_type_id',
        'quality',
        'material',
        'model_count',
        'base_size',
        'sold_at'
    ];

    protected $casts = [
        'features' => 'array',
        'keywords' => 'array',
        'wargear' => 'array',
        'sold_at' => 'datetime',
    ];

    protected $hidden =
    [
        'created_at',
        'updated_at'
    ];

    public function range(): BelongsTo
    {
        return $this->belongsTo(Range::class);
    }

    public function unitType(): BelongsTo
    {
        return $this->belongsTo(UnitType::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Images::class);
    }

    public function primaryImage()
    {
        return $this->images()->where('is_primary', 1);
    }

    public function createIdentifier(): void
    {
        $this->identifier = strtoupper(substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'), 0, 6));
        $this->save();
    }
}
