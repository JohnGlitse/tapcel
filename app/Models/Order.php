<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'telephone',
        'gender',
        'region',
        'address',
        'city',
        'status',
        'tracking_number'
    ];
}
