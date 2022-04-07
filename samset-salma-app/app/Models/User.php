<?php

namespace App\Models;

use App\Traits\Observable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // use Observable;
    public $timestamps = false;

    protected $table = 'user';
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'name';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'password',
        'level_akses',
    ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    // ];

    // public function setPasswordAttribute($password){
    //     echo 'password: ';
    //     echo $password;
    //     echo ' \n';

    //     if(trim($password) === ""){
    //         return;
    //     }
    //     $password = Hash::make($password);
    //     echo 'hash: ';
    //     echo $password;
    //     echo ' \n';
    //     $this->password = $password;
    // }
}
