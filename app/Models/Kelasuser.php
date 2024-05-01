<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Kelasuser extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];
    protected $table = 'kelas_user';
    public $timestamps = false;

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define how to get the notifiable id
    public function routeNotificationFor($channel)
    {
        return $this->user;
    }
}
