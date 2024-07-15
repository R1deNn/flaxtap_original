<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Attachment\Attachable;
use Orchid\Screen\AsSource;

class Cart extends Model
{
    use HasFactory, AsSource, Attachable;

    protected $fillable = [
        'id_user',
        'id_product',
        'amount',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'id_product');
    }
}
