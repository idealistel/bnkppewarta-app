<?php

namespace App\Models;

use DateTime;
use Carbon\Carbon;
use App\Models\Keluarga;
use App\Models\StatusJemaat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jemaat extends Model
{
    use HasFactory;

    protected $table = 'jemaat';

    protected $fillable = [
        'stambuk',
        'keluarga_id',
        'nama',
        'alias',
        'jeniskelamin',
        'tempatlahir',
        'tanggallahir',
        'hubungankeluarga',
        'namaayah',
        'namaibu',
        'statusbaptis',
        'statussidi',
        'statusnikah',
        'pendidikan',
        'pekerjaan',
        'tanggaldaftar',
        'hp',
        'status'
    ];

    protected $primaryKey = 'stambuk';

    public $incrementing = false;

    protected $keyType = 'string';

    public function setTanggalLahirAttribute($value)
    {
        if ($value) {
            $this->attributes['tanggallahir'] = DateTime::createFromFormat('d-m-Y', $value)->format('Y-m-d');
        } else {
            $this->attributes['tanggallahir'] = null;
        }
    }

    public function setTanggalDaftarAttribute($value)
    {
        if ($value) {
            $this->attributes['tanggaldaftar'] = DateTime::createFromFormat('d-m-Y', $value)->format('Y-m-d');
        } else {
            $this->attributes['tanggaldaftar'] = null;
        }
    }

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'keluarga_id', 'keluarga_id');
    }

    public function getUsiaAttribute()
    {
        return Carbon::parse($this->tanggallahir)->age;
    }

    public function getGolonganUsiaAttribute()
    {
        $usia = $this->usia;
        $statusPernikahan = $this->hubungankeluarga;

        if ($usia <= 5) {
            return 'balita';
        } elseif ($usia <= 12) {
            return 'anak-anak';
        } elseif ($usia <= 20 && !in_array($statusPernikahan, ['kepala keluarga', 'istri'])) {
            return 'remaja';
        } elseif ($usia <= 59) {
            return 'dewasa';
        } else {
            return 'lansia';
        }
    }

    public function statusjemaat()
    {
        return $this->hasOne(StatusJemaat::class, 'stambuk', 'stambuk');
    }
}
