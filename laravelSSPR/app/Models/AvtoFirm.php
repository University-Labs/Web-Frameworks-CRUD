<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BaseAvto;

class AvtoFirm extends Model
{
    //имя таблицы
    protected $table = 'avtofirm';

    //первичный ключ
    protected $primaryKey = "PK_AvtoFirm";

    //отключение полей updated_at, created_at
    public $timestamps = false;

    protected $fillable = [
        'firmName',
    ];

    public function baseAvto()
    {
    	return $this->hasMany(BaseAvto::class, 'PK_AvtoFirm', 'PK_AvtoFirm');
    }
}
