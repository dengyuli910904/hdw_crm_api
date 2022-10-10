<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Promoter extends Authenticatable
{
    use HasApiTokens, Notifiable;
    const STATUS_ENABLED  = 1;
    const STATUS_ABLED = 0;
    const MALE = 1;
    const FEMALE = 0;
    public $fillable = ['username','email','phone','sex','status','password'];

    protected $guard_name = 'promoter';
}
