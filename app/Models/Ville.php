<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static where(string $string, string $string1, string $string2)
 */
class Ville extends Model
{
    use HasFactory;

    protected $table = 'villes';
    protected $dates = ['created_at', 'updated_at'];
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function etatDesLieux(): HasMany
    {
        return $this->hasMany('App\Models\EtatDesLieux');
    }
}
