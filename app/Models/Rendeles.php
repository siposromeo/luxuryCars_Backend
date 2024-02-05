<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Rendeles extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function auto(): BelongsToMany{
        return $this->belongsToMany(Auto::class, 'auto_id', 'felhasznalo_id', 'naptar_id');
    }
}
