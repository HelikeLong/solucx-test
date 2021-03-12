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
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public static $rules = [
        "name" => "required|max:150",
        "email" => "required|email|max:100",
        "phone" => "required|regex:/^\(?[1-9]{2}\)? ?(?:[2-8]|9[1-9])[0-9]{3}\-?[0-9]{4}$/i|max:15",
        "document" => "required|regex:/^$[0-9]{3}.?[0-9]{3}.?[0-9]{3}-?[0-9]{2}/i|max:15"
    ];

    /**
     * @return HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany('App\Models\Transaction');
    }
}
