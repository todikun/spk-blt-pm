<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembobotan extends Model
{
    use HasFactory;
    protected $table = 'pembobotan';
    protected $guarded = [];
    public $timestamps = false;
}
