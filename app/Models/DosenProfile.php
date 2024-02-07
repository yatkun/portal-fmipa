<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'dosen_profiles';


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
