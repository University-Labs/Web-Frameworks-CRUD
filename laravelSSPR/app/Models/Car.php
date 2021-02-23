<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BaseAvto;
use App\Models\Superstructure;
use App\Models\AvtoCategory;


class Car extends Model
{
    //имя таблицы
    protected $table = 'car';

    //первичный ключ
    protected $primaryKey = "PK_Car";

    //отключение полей updated_at, created_at
    public $timestamps = false;

    protected $fillable = [
        'PK_BaseAvto',
        'PK_Superstructure',
        'PK_Category',
        'price',
        'yearIssue',
        'description',
        'imagePath',
    ];


    public function baseAvto()
    {
    	return $this->belongsTo(BaseAvto::class, 'PK_BaseAvto', 'PK_BaseAvto');
    }

    public function avtoCategory()
    {
    	return $this->belongsTo(AvtoCategory::class, 'PK_Category', 'PK_Category');
    }

    public function superstructure()
    {
    	return $this->belongsTo(Superstructure::class, 'PK_Superstructure', 'PK_Superstructure');
    }

}
