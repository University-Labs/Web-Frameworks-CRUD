<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AvtoFirm;
use App\Models\Car;

class BaseAvto extends Model
{
    //имя таблицы
    protected $table = 'baseavto';

    //первичный ключ
    protected $primaryKey = "PK_BaseAvto";

    //отключение полей updated_at, created_at
    public $timestamps = false;

    protected $fillable = [
        'modelName',
        'PK_AvtoFirm'
    ];

    public function avtoFirm()
    {
    	return $this->belongsTo(AvtoFirm::class, 'PK_AvtoFirm', 'PK_AvtoFirm');
    }

    public function car()
    {
    	return $this->hasMany(Car::class, 'PK_AvtoFirm', 'PK_AvtoFirm');
    }
}
