<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $table = 'escuela'; // nombre exacto en tu base de datos

    protected $fillable = ['NumCUE','matricula', 'Escuela'];

    public $timestamps = false; // si tu tabla no tiene campos created_at y updated_at
}
