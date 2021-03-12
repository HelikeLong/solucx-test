<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $transaction_id
 * @property integer $grade
 * @property string $comments
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Transaction $transaction
 */
class Evaluation extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['transaction_id', 'grade', 'comments', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return BelongsTo
     */
    public function transaction(): BelongsTo
    {
        return $this->belongsTo('App\Models\Transaction');
    }
}
