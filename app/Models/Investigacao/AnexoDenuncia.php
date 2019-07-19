<?php

namespace App\Models\Investigacao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;

class AnexoDenuncia extends Model
{
    use SoftDeletes, Auditable;

    protected $table = 'denuncias_anexos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_anexo', 'caminho_arquivo',
        'denuncia_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function denuncia()
    {
        return $this->belongsTo(EntidadeDenuncia::class, 'denuncia_id', 'id');
    }
}
