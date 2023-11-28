<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $table = "gajis";
    protected $primaryKey = "id";
    protected $fillable = ['nip_id','gapok','tnj_istri'];
    
    public function nip  ()
    {
        return $this->belongsTo(User::class);
    }
}
