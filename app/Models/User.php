<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'emails',
        'password',
        'avatar'
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

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = ($password);
    }

    public function getNameAttribute($name)
    {
        return $name;
    }

    public  function updateAvatarAttribute($image)
    {
        $filename =  $image->getClientOriginalName();
        $this->deleteOldAvatar();
        $image->storeAs('images', $filename ,'public');
        $this->update(['avatar' => $filename]);
    }

    protected function deleteOldAvatar()
    {
        if($this->avatar)
        {
            Storage::delete('/public/images/'.auth()->user()->avatar);
        }
    }

    public function todos()
    {
        return $this->hasMany(ToDo::class);
    }

}
