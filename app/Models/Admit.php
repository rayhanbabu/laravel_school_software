<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admit extends Model
{
    use HasFactory;
    protected $table='admits';
    protected $fillable =[
        'eiin',
        'section',
        'class',
        'babu',
       
    ];
}
