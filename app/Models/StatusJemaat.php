<?php

namespace App\Models;

use DateTime;
use App\Models\Jemaat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusJemaat extends Model
{
    use HasFactory;

    protected $table = 'statusjemaat';

    protected $guarded = ['id'];

    public function jemaat()
    {
        return $this->belongsTo(Jemaat::class, 'stambuk', 'stambuk');
    }

    public function setTanggalStatusAttribute($value)
    {
        if ($value) {
            $date = DateTime::createFromFormat('d-m-Y', $value);
            if ($date) {
                $this->attributes['tanggalstatus'] = $date->format('Y-m-d');
            } else {
                // Tanggal tidak valid, Anda bisa memutuskan untuk mengatur ke null atau memberi pesan error
                $this->attributes['tanggalstatus'] = null;
                // Optional: tambahkan log atau handle error lainnya
            }
        } else {
            $this->attributes['tanggalstatus'] = null;
        }
    }
}
