<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewProducts extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'harga', 'gambar', 'detail'
    ];
}
