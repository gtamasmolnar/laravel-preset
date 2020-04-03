<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, LogsActivity;

    protected $fillable = [
        'active',
        'name',
        'surname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'integer',
        'email_verified_at' => 'datetime',
    ];

    public function activities()
    {
        return $this->belongsToMany('App\Activity', 'activity_log', 'user_id', 'causer_id')->withTimestamps();
    }

    public function ego()
    {
        return $this->id === 1;
    }

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->surname}";
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function hasAnyRoles($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function info()
    {
        return $this->hasOne('App\Info'); // hasOne relationship does NOT have withTimestamps method !!!!!!
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    public function setting()
    {
        return $this->hasOne('App\Setting'); // hasOne relationship does NOT have withTimestamps method !!!!!!
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'tag_user', 'user_id', 'tag_id')->withTimestamps();
    }
}
