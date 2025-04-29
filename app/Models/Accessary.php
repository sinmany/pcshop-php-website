<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessary extends Model
{
    protected $table = 'accessary';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];
    use HasFactory;
}
