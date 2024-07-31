<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the articles for the member.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    //リレーション
    public function articles()
    {
        return $this->hasMany(Article::class, 'member_id');
    }
}
