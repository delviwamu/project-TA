<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCase extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relasi many-to-one: satu ClientCase hanya punya satu Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    
    public function kepala_advokasi()
    {
        return $this->belongsTo(User::class, 'kepala_advokasi_id', 'id');
    }
    
    public function pengacara()
    {
        return $this->belongsTo(User::class, 'pengacara_id', 'id');
    }
}
