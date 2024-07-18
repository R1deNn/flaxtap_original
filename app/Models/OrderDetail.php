<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Orchid\Screen\AsSource;

class OrderDetail extends Model
{
    use HasFactory, AsSource, Notifiable;

    public $timestamps = true; 

    protected $fillable = [
        'order_id',
        'product_id',
        'amount',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Shop::class, 'product_id');
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function shop(): HasMany
    {
        return $this->hasMany(Shop::class, 'id');
    }
}
