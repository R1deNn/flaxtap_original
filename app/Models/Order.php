<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Orchid\Screen\AsSource;

class Order extends Model
{
    use HasFactory, AsSource, Notifiable;

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
}
