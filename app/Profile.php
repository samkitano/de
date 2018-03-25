<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Profile
 *
 * @property int $id
 * @property int $user_id
 * @property int $xp
 * @property string|null $bio
 * @property int $use_nick
 * @property int $show_age
 * @property int $changed_nick
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereChangedNick($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereShowAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUseNick($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereXp($value)
 * @mixin \Eloquent
 */
class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'xp', 'bio', 'use_nick', 'changed_nick',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'canChangeNick',
    ];

    /**
     * canChangeNick accessor
     *
     * @return bool
     */
    public function getCanChangeNickAttribute(): bool
    {
        return $this->canChangeNick();
    }

    /**
     * User Relationship
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check if user can change nickname
     *
     * @return bool
     */
    protected function canChangeNick(): bool
    {
        return $this->xp > 50 && ! $this->changed_nick;
    }
}
