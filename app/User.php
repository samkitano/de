<?php

namespace App;

use Carbon\Carbon;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $nick_name
 * @property string $email
 * @property string $password
 * @property \Carbon\Carbon|null $last_active
 * @property string|null $banned
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read string $name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBanned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereNickName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'nick_name', 'email', 'password', 'last_active', 'banned',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'banned',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['last_active'];

    /**
     * @return string
     */
    public function getNameAttribute(): string
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * @return User
     */
    public function registerLastActivity(): self
    {
        $this->last_active = Carbon::now();

        return $this;
    }

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
        return 'front';
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

    /**
     * @return bool
     */
    public function isBanned(): bool
    {
        return $this->banned !== null;
    }

    public function ban()
    {
        $this->banned = Carbon::now();
    }

    public function unban()
    {
        $this->banned = null;
    }
}
