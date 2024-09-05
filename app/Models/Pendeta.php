<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendeta extends Model
{
    use HasFactory;

    protected $table = 'pendeta';

    protected $guarded = ['id'];

    protected $dates = ['prdawal', 'prdakhir'];

    public function setPrdAwalAttribute($value)
    {
        if ($value) {
            $this->attributes['prdawal'] = DateTime::createFromFormat('d-m-Y', $value)->format('Y-m-d');
        } else {
            $this->attributes['prdawal'] = null;
        }
    }

    public function setPrdAkhirAttribute($value)
    {
        if ($value) {
            $this->attributes['prdakhir'] = DateTime::createFromFormat('d-m-Y', $value)->format('Y-m-d');
        } else {
            $this->attributes['prdakhir'] = null;
        }
    }
}
