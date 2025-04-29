<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $table = 'computer';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];
    use HasFactory;
}
