<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table='accounts';

    protected $fillable = [
        'avatar',
        'id',
        'name',
        'email',
        'uid',
        'password',
        'numcomments',
        'google_id',
        'ban'
    ];
}
