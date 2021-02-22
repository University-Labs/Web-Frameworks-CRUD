<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvtoCategory extends Model
{
    //имя таблицы
    protected $table = 'avtocategory';

    //первичный ключ
    protected $primaryKey = "PK_Category";

    //отключение полей updated_at, created_at
    public $timestamps = false;
}
