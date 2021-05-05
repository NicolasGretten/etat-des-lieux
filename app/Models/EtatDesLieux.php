<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, mixed $id)
 */
class EtatDesLieux extends Model
{

    use HasFactory;

//    protected $connection = 'data';
    protected $table = 'etat_des_lieux';
    protected $dates = ['created_at', 'updated_at'];
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
}
