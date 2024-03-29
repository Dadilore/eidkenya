<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticationLoggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function full_name(){
        return $this->name.' '.$this->middle_name.' '.$this->surname;
    }

    public function roles()
	{
		return $this->belongsToMany(Role::class, 'user_roles')->using(UserRole::Class)->withTimestamps();
	}

	public function inRole(array $roleSlugs)
	{
		foreach ($this->roles as $role) {
			if($role->hasSlug($roleSlugs)){
				return true;
			}
		}

		return false;
	}

    public function applications()
    {
        return $this->hasMany(Applications::class);
    }
}
