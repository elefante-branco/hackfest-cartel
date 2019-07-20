<?php

namespace App\Models\Investigacao;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class PostoDenuncia extends Model implements Auditable
{
    use SoftDeletes, \OwenIt\Auditing\Auditable;

    protected $table = 'posto_denuncias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'anonimo',
        'usuario_id', 'usuario_validador_id',
        'posto_id',
    ];

    /**
     * Status
     */
    const STATUS_AGUARDANDO = 1;
    const STATUS_EM_PROCESSO = 2;
    const STATUS_FINALIZADO = 3;

    const LABEL_STATUS = [
        self::STATUS_AGUARDANDO => 'Aguardando',
        self::STATUS_EM_PROCESSO => 'Em processo',
        self::STATUS_FINALIZADO => 'Finalizado',
    ];

    const COLOR_STATUS = [
        self::STATUS_AGUARDANDO => 'gray',
        self::STATUS_EM_PROCESSO => 'orange',
        self::STATUS_FINALIZADO => 'green',
    ];

    public function getStatusBadgeAttribute()
    {
        return '<span class="badge bg-'.self::COLOR_STATUS[$this->status].'">'.self::LABEL_STATUS[$this->status].'</span>';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario_validador()
    {
        return $this->belongsTo(User::class, 'usuario_validador_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function posto()
    {
        return $this->belongsTo(Posto::class, 'posto_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function anexos()
    {
        return $this->hasMany(AnexoDenuncia::class, 'denuncia_id', 'id');
    }
}
