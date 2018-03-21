<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Administrator
 *
 * @property int $id
 * @property string|null $name
 * @property string $nick_name
 * @property string $email
 * @property string|null $password
 * @property int $root_user
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Administrator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Administrator whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Administrator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Administrator whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Administrator whereNickName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Administrator wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Administrator whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Administrator whereRootUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Administrator whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Administrator extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nick_name', 'email', 'password',
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
     * @return bool
     */
    public function isCurrentUser(): bool
    {
        $guardMatches = $this->guardDriver() === config('auth.defaults.guard');

        return $guardMatches && $this->id ? $this->id === auth()->id() : false;
    }

    /**
     * @return string
     */
    public function guardDriver(): string
    {
        return 'admin';
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        Mail::to($this->email)->send(new ResetPassword($this, $token));
    }
}
