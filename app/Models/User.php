<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, SoftDeletes, HasFactory, Notifiable, HasRoles, AuthenticationLoggable;

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'google_id',
        'facebook_id',
        'github_id',
        'foto',
        'alamat',
        'about',
        'jobtitle',
        'at',
        'website',
        'github',
        'twitter',
        'instagram',
        'facebook',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likedArticle()
    {
        return $this->belongsToMany(Article::class)->withTimestamps();
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
