<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tugasuser extends Model
{
    use HasFactory;
    use Notifiable;

    protected $guarded = [];
    protected $table = 'tugas_user';
    public $timestamps = false;


    public function kelasUser()
    {
        return $this->belongsTo(Kelasuser::class);
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function routeNotificationFor($channel)
    {
        return $this->user;
    }

   
}
