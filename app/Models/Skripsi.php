<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skripsi extends Model
{
    use HasFactory;
    
     /**
     * fillable
     *
     * @var array
     */

     protected $table = 'skripsis';
     protected $fillable = [
        'author',
        'title',
        'pages',
        'university',
        'thn_terbit'
     ];
}
