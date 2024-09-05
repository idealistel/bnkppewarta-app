<?php

namespace App\Models;

use App\Models\Jemaat;
use App\Models\Sector;
use App\Models\Kelurahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keluarga extends Model
{
    use HasFactory;

    protected $table = 'keluarga';

    protected $fillable = ['keluarga_id', 'kelurahan_id', 'sector_id', 'nama', 'alias', 'alamat'];

    protected $primaryKey = 'keluarga_id';

    public $incrementing = false;

    protected $keyType = 'string';

    public function getRouteKeyName()
    {
        return 'keluarga_id';
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::creating(function ($model) {
    //         $lastId = Keluarga::max('id');
    //         $number = $lastId ? intval(substr($lastId, 3)) + 1 : 1;
    //         $model->id = str_pad($number, 4, '0', STR_PAD_LEFT);
    //     });
    // }

    public function jemaat()
    {
        return $this->hasMany(Jemaat::class, 'keluarga_id', 'keluarga_id');
    }
}
