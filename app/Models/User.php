<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function manykelas(): BelongsToMany
    {
        return $this->belongsToMany(Kelas::class, 'kelas_user');
    }


    public function dosenProfile()
    {
        return $this->hasOne(DosenProfile::class, 'user_id');
    }

    public function mahasiswaProfile()
    {
        return $this->hasOne(MahasiswaProfile::class, 'user_id');
    }
}
