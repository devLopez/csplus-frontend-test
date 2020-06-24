<?php

namespace Spa\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Spa\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spa\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Spa\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

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

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
    }
}
