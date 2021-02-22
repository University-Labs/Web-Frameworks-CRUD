<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseAvto extends Model
{
    //имя таблицы
    protected $table = 'baseavto';

    //первичный ключ
    protected $primaryKey = "PK_BaseAvto";

    //отключение полей updated_at, created_at
    public $timestamps = false;
}
