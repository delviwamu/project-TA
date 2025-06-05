<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relasi one-to-many: satu Client punya banyak ClientCase
    public function clientCases()
    {
        return $this->hasMany(ClientCase::class, 'client_id', 'id');
    }
}
