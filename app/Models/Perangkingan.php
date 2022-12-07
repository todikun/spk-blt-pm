<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perangkingan extends Model
{
    use HasFactory;
    protected $table = 'perangkingan';
    protected $guarded = [];
    public $timestamps = false;
}
