<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Auto extends Model
{
    use HasFactory;
    public $timestamps = false;

    /**
     * Get all of the comments for the Auto
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rendelesek(): HasMany
    {
        return $this->hasMany(Rendeles::class);
    }
}
