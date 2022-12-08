<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspek extends Model
{
    use HasFactory;
    protected $table = 'aspek';
    protected $guarded = [];
    public $timestamps = false;

    public function kriteria()
    {
        return $this->hasMany('App\Models\Kriteria', 'aspekid', 'id');
    }

    public function warga()
    {
        return $this->hasMany('App\Models\Hasil', 'aspekid', 'id');
    }
}
