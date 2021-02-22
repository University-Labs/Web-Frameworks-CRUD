<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvtoFirm extends Model
{
    //имя таблицы
    protected $table = 'avtofirm';

    //первичный ключ
    protected $primaryKey = "PK_AvtoFirm";

    //отключение полей updated_at, created_at
    public $timestamps = false;
}
