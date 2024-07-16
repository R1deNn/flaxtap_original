<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
