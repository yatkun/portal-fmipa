<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'kelas_user');
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    public function deskripsi()
    {
        return $this->hasOne(Deskripsikelas::class);
    }
    

}
