<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

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

    protected $hidden = ['ville_id', 'type_id', 'photo', 'updated_at', 'created_at'];

    protected $appends = ['ville', 'type', 'image'];


    public function type(): BelongsTo
    {
        return $this->belongsTo('App\Models\Type');
    }

    public function ville(): BelongsTo
    {
        return $this->belongsTo('App\Models\Ville');
    }

    public function getVilleAttribute(): String
    {
        return $this->ville()->value('nomVille');
    }

    public function getTypeAttribute(): String
    {
        return $this->type()->value('libelle');
    }

    public function getImageAttribute(): String
    {
        $data = base64_encode(Storage::get($this->photo));
        return $data;
    }
}
