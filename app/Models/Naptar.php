<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Naptar extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'berles_Kezdete',
        'berles_Vege',
        'berles_Idotartama',
        'auto_id'
    ];
}
