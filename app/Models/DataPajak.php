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
        'alamatusaha',
        'teleponusaha',
        'jenispendapatan',
        'tanggalpendaftaran',
        'namapemilik',
        'nikpemilik',
        'jabatanpemilik',
        'alamatpemilik',
        'teleponpemilik',
    ];
}
