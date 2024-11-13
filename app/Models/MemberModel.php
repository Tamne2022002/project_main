<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberModel extends Authenticatable
{
    use HasFactory, Notifiable,SoftDeletes;

    protected $table = 'table_member';
    protected $fillable = ['name', 'phone','address','email','password',];

    protected $hidden = ['password','remember_token',];
}
