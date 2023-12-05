<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'jabatan_id',
        'golongan_id',
        'nip',
        'password',
        'position',
        'departement'
    ];

    public function gaji ()
    {
        return $this->hasMany(Gaji::class);
    }

    public function potongan ()
    {
        return $this->hasMany(Potongan::class);
    }

    
    public function jabatan  ()
    {
        return $this->belongsTo(Positions::class);
    }

    public function golongan  ()
    {
        return $this->belongsTo(Golongan::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'nip_verified_at' => 'datetime',
    ];
}
