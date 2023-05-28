<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculator extends Model
{
    use HasFactory;
    protected $table = 'calculator';
    protected $fillable = [
        'bilangan1',
        'bilangan2',
        'operation',
        'result',
    ];
}
