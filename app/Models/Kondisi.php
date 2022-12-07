<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
    use HasFactory;
    protected $table = 'kondisi';
    protected $guarded = [];
    public $timestamps = false;

    public function warga()
    {
        return $this->belongsTo('App\Models\Warga', 'wargaid', 'id');
    }

    public function kriteria()
    {
        return $this->belongsTo('App\Models\Kriteria', 'kriteriaid', 'id');
    }

    public function hasil()
    {
        return $this->hasMany('App\Models\Hasil', 'kondisiid', 'id');
    }
}
