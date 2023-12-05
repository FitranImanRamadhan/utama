<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potongan extends Model
{
    use HasFactory;

    protected $table = "potongans";
    protected $primaryKey = "id";
    protected $fillable = [ 'user_id',
                            'bulan',
                            'zakat',
                            'tnj_istri',
                            'tnj_anak',
                            'tnj_umum',
                            'tnj_beras',
                            'pph',
                            'tnj_struktural',
                            'tnj_fungsional',
                            'tnj_terpencil',
                            'pembulatan',
                            'tnj_kinerja',
                            'tnj_makan',
                            'total_gaji'];
    
    public function user  ()
    {
        return $this->belongsTo(User::class);
    }
}
