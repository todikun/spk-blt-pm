<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $guarded = [];
    public $timestamps = false;

    public function aspek()
    {
        return $this->belongsTo('App\Models\Aspek', 'aspekid', 'id');
    }

    public function kondisi()
    {
        return $this->hasMany('App\Models\Kondisi', 'kriteriaid', 'id');
    }


    public function hasil()
    {
        return $this->hasMany('App\Models\Hasil', 'kondisiid', 'id');
    }
}
