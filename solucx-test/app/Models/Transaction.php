<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $client_id
 * @property int $store_id
 * @property int $collaborator_id
 * @property string $date
 * @property float $value
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Client $client
 * @property Collaborator $collaborator
 * @property Store $store
 * @property Evaluation[] $evaluations
 */
class Transaction extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['client_id', 'store_id', 'collaborator_id', 'date', 'value', 'deleted_at', 'created_at', 'updated_at'];
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    /**
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo('App\Models\Client');
    }

    /**
     * @return BelongsTo
     */
    public function collaborator(): BelongsTo
    {
        return $this->belongsTo('App\Models\Collaborator');
    }

    /**
     * @return BelongsTo
     */
    public function store(): BelongsTo
    {
        return $this->belongsTo('App\Models\Store');
    }

    /**
     * @return HasMany
     */
    public function evaluations(): HasMany
    {
        return $this->hasMany('App\Models\Evaluation');
    }
}
