<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Naptar extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'berles_Kezdete',
        'berles_Vege',
        'berles_Idotartama'
    ];
    public function rendeles(): BelongsToMany{
        return $this->belongsToMany(Rendeles::class, 'auto_id', 'felhasznalo_id', 'rendeles_id');
    }
}
