<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Papel extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable, SoftDeletes;

    /**
     * @var string
     * The table associated with the model.
     */
    protected $table = 'papeis';

    /**
     * @var array
     * The attributes that should be mass assignable.
     */
    protected $fillable = [
        'descricao', 'slug',
    ];

    /**
     * Constantes.
     */
    const ROLE_ADMINISTRADOR = 1;
    const ROLE_USUARIO_COMUM = 2;
    const ROLE_MP = 3;

    const ROLE_LABELS = [
        self::ROLE_ADMINISTRADOR => 'Administrador',
        self::ROLE_USUARIO_COMUM => 'Usuário Comum',
        self::ROLE_MP => 'Funcionário do MP',
    ];

    const ROLE_SLUGS = [
        self::ROLE_ADMINISTRADOR => 'administrador',
        self::ROLE_USUARIO_COMUM => 'usuario',
        self::ROLE_MP => 'mp',
    ];

    /**
     * The attributes that should be mutated to dates.
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * Retorna o valor geral do slug, sendo esse a primeira palavra anterior
     * @return mixed
     */
    public function getGeneralSlugAttribute()
    {
        return explode('-', $this->slug)[0];
    }

    /**
     * Retorna a label do papel
     * @return mixed
     */
    public function getLabelAttribute()
    {
        return self::ROLE_LABELS[$this->id];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany(User::class, 'papel_id', 'id');
    }
}
