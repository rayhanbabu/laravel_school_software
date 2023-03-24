<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table='exams';
    protected $fillable =[
         'serial',
         'babu',
         'text1',
         'text2',
         'text3',
         'text4',
      
    ];
}
