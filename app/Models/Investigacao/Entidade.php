<?php

namespace App\Models\Investigacao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;

class Entidade extends Model
{
    use SoftDeletes, Auditable;

    protected $table = 'entidades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'cnpj',
        'latitude', 'longitude',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contextos_entidade()
    {
        return $this->hasMany(ContextoEntidade::class, 'entidade_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function precos()
    {
        return $this->hasMany(Preco::class, 'entidade_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function denuncias()
    {
        return $this->hasMany(EntidadeDenuncia::class, 'entidade_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function contextos()
    {
        return $this->hasManyThrough(Contexto::class, ContextoEntidade::class,
            'entidade_id', 'id',
            'id', 'contexto_id');
    }
}
