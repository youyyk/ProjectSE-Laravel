<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'path',
        'last_login'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bills(){
        return $this->hasMany(Bill::class);
    }

    public function isType($type){
        return $this->type === $type;
    }

    public function isAdmin(){
        return $this->isType('Admin');
    }

    public function isFrontWorker(){
        return $this->isType('FrontWorker');
    }

    public function isBackWorker()
    {
        return $this->isType('BackWorker');
    }

//    /**
//     * The user has been authenticated.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  mixed  $user
//     * @return mixed
//     */
//    protected function authenticated(Request $request, $user)
//    {
//        //
//    }

}
