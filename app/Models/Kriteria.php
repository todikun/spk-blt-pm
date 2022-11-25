<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $fillable = ['aspekid', 'nama', 'kondisi', 'nilai', 'target'];
    public $timestamps = false;

    public function aspek()
    {
        return $this->belongsTo('App\Models\Aspek', 'aspekid', 'id');
    }
}
