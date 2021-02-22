<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //имя таблицы
    protected $table = 'car';

    //первичный ключ
    protected $primaryKey = "PK_Car";

    //отключение полей updated_at, created_at
    public $timestamps = false;
}
