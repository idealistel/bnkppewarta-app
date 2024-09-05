<?php

namespace App\Models;

use App\Models\Keluarga;
use App\Models\PengurusSektor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function saat_ini(): HasMany
    {
        return $this->hasMany(PengurusSektor::class);
    }
    public function pengurussektor(): HasMany
    {
        return $this->hasMany(PengurusSektor::class);
    }

    public function getRouteKeyName(): string
    {
        return 'nama';
    }

    public function keluarga()
    {
        return $this->hasMany(Keluarga::class);
    }
}
