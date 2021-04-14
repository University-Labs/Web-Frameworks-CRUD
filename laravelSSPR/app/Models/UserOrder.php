<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    protected $fillable = [
    	'PK_User',
    	'PK_Car'
    ];


    public function car()
    {
    	return $this->belongsTo(Car::class, 'PK_Car', 'PK_Car');
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'PK_User', 'id');
    }

}
