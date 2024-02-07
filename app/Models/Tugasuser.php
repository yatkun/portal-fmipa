<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugasuser extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'tugas_user';
    public $timestamps = false;


    public function kelasUser()
    {
        return $this->belongsTo(Kelasuser::class);
    }
}
