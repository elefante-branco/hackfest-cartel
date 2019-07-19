<?php

namespace App;

use App\Models\Papel;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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


    /**
     * Checa se o usuário pertence ao papel
     * @param string $roleSlug
     * @return bool
     */
    public function checkRole(string $roleSlug) : bool
    {
        return $this->papel->slug == $roleSlug;
    }

    /**
     * Checa se o usuário pertence ao grupo de papeis
     * @param string $roleGeneralSlug
     * @return bool
     */
    public function checkGeneralRole(string $roleGeneralSlug) : bool
    {
        return $this->papel->general_slug == $roleGeneralSlug;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function papel()
    {
        return $this->belongsTo(Papel::class);
    }
}
