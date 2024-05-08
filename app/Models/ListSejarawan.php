<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListSejarawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birthdate',
        'origin',
        'sex',
        'description',
        'image',
    ];
}
