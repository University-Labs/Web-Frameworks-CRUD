<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Superstructure extends Model
{
    //имя таблицы
    protected $table = 'superstructure';

    //первичный ключ
    protected $primaryKey = "PK_Superstructure";

    //отключение полей updated_at, created_at
    public $timestamps = false;


    public function car()
    {
    	return $this->hasMany(Car::class, 'PK_Superstructure', 'PK_Superstructure');
    }
}
