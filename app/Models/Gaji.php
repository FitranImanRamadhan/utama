<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $table = "gajis";
    protected $primaryKey = "id";
    protected $fillable = [ 'user_id',
                            'gapok',
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
