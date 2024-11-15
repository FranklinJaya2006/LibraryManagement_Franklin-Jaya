<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Newspaper extends Model
{
    use HasFactory;
    
     /**
     * fillable
     *
     * @var array
     */

    protected $table = 'newspapers';
    protected $fillable = [
        'author',
        'title',
        'publisher',
        'category',
        'thn_terbit',
        'status'
    ];
}
