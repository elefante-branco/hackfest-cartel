<?php

namespace App\Models\Investigacao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;

class Preco extends Model
{
    use SoftDeletes, Auditable;

    protected $table = 'precos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'valor',
        'entidade_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function precos()
    {
        return $this->belongsTo(Entidade::class, 'entidade_id', 'id');
    }
}
