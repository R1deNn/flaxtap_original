<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Attachment\Attachable;
use Orchid\Screen\AsSource;

class Like extends Model
{
    use HasFactory, AsSource, Attachable;

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'product_id');
    }
}
