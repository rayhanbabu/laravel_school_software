<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable =[
        'image',
        'stu_id',
        'codema',
        'roll',
        'name',
        'eiin',
        'class',
        'section',
        'babu',
        'year',
        'exam',
        'father',
        'mother',
        'address',
        'father',
        'phone',
        'birth_date',
        'moral',
        'main',
        'addi',
    
     ];
  
}
