<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'name_food',
        'price',
        'quantity',
        'image',
        'delivery_status',
        'paid',

    ];

  
    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    public function Food()
{
    return $this->belongsToMany(Food::class);
}


}
