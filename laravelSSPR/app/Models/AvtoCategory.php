<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class AvtoCategory extends Model
{
    //имя таблицы
    protected $table = 'avtocategory';

    //первичный ключ
    protected $primaryKey = "PK_Category";

    //отключение полей updated_at, created_at
    public $timestamps = false;

    protected $fillable = [
        'nameCategory',
    ];

    public function car()
    {
    	return $this->hasMany(Car::class, 'PK_Category', 'PK_Category');
    }
}
