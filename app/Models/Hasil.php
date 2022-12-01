<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $table = 'hasil';
    protected $fillable = ['wargaid', 'kondisiid', 'nilai', 'kriteriaid'];
    public $timestamps = false;

    public function warga()
    {
        return $this->belongsTo('App\Models\Warga', 'wargaid', 'id');
    }

    public function kondisi()
    {
        return $this->belongsTo('App\Models\Kondisi', 'kondisiid', 'id');
    }
}
