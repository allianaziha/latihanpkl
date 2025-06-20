<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillabel = ['user_id','order_code','total_price','status'];

    //relasi many to many
     public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty','price')
                    ->withTimestamps();
    }

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
