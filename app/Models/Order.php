<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Orchid\Attachment\Attachable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class Order extends Model
{
    use HasFactory, AsSource, Notifiable, Attachable, Chartable;

    public $timestamps = true; 

    protected $fillable = [
        'user_id',
        'type_delivery',
        'fio',
        'adress',
        'tel',
        'email',
        'vk',
        'price',
        'status',
    ];

    public function OrderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function detailsUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
