<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $document
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Transaction[] $transactions
 */
class Client extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'document', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany('App\Models\Transaction');
    }
}
