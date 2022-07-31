<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiskonProducts extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama','harga_asli','harga_diskon','gambar','keterangan', 'detail'
    ];
}
