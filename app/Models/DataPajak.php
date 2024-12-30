<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPajak extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'npwpd',
        'namausaha',
        'jenisusaha',
        'latitude',
        'longitude',
        'teleponusaha',
        'jenispendapatan',
        'tanggalpendaftaran',
        'namapemilik',
        'nikpemilik',
        'jabatanpemilik',
        'alamatpemilik',
        'teleponpemilik',
    ];

    protected $hidden = ['created_at', 'updated_at']; // Sembunyikan kolom ini secara default
}
