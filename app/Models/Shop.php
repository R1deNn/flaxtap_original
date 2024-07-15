<?php

namespace App\Models;

use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Attachment\Attachable;

class Shop extends Model
{
    use HasFactory, AsSource, Attachable;

    protected $fillable = [
        'id_category',
        'title',
        'description',
        'default_price',
        'price_student',
        'price_opt_student',
        'amount',
        'active',
        'image',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function vobler(): BelongsTo
    {
        return $this->belongsTo(Vobler::class, 'id_vobler');
    }

    public function scopeOrderedBy($query, $column, $direction = 'asc')
    {
        return $query->orderBy($column, $direction);
    }
}
