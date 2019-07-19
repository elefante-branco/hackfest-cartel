<?php

namespace App;

use App\Models\Papel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Auditable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'password',
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
