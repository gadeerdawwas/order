<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Order()
    {
        return $this->belongsTo(Order::class ,'order_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
