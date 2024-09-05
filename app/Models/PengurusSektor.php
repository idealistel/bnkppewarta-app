<?php

namespace App\Models;

use DateTime;
use App\Models\Sector;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengurusSektor extends Model
{
    use HasFactory;

    protected $table = 'pengurussektor';

    protected $guarded = ['id'];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

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

    // protected $fillable = ['sector_id', 'prdawal', 'prdakhir', 'koordinator', 'sekretaris', 'bendahara'];
}
