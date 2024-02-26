<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rendeles extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Get the user that owns the Rendeles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function auto(): BelongsTo
    {
        return $this->belongsTo(Auto::class);
    }
    /**
     * Get the user that owns the Rendeles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'felhasznalo_id');
    }
    /**
     * Get the user associated with the Rendeles
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function naptar(): HasOne
    {
        return $this->hasOne(Naptar::class, 'id');;
    }
}
