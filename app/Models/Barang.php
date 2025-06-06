<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'nama_barang',
        'kategori',
        'stok',
        'harga_satuan',
        'keterangan',
    ];
}
