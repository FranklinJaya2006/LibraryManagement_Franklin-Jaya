<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dvd extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $table = 'dvds';
    protected $fillable = [
        'author',
        'title',
        'artist',
        'genre',
        'thn_terbit',
        'status'
    ];
}
