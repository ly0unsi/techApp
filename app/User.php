<?php

namespace App;

use App\Models\Like;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function posts()
    {
        return $this->HasMany(Post::class);
    }
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function followers()
    {
        return $this->belongsToMany(User::class, 'following', 'followed_id', 'follower_id')->withTimestamps();
    }
    public function followings()
    {
        return $this->belongsToMany(User::class, 'following', 'follower_id', 'followed_id')->withTimestamps();
    }
    public function isFollowedBy(User $user)
    {
        return !!$this->followers()->where('follower_id', $user->id)->count();
    }
    public function getUserIds()
    {
        return $this->followings()->pluck('followed_id');
    }
}
