<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;
    protected $table = 'warga';
    protected $guarded = [];
    public $timestamps = false;

    public function kondisi()
    {
        return $this->hasMany('App\Models\Kondisi', 'wargaid', 'id');
    }

    public function hasil()
    {
        return $this->hasMany('App\Models\Hasil', 'wargaid', 'id');
    }
}
