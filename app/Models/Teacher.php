<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table='teachers';
    protected $fillable =[
         'name',
         'phone',
         'email',
         'eiin',
         'teacher_userid',
         'teacher_password',
         'status',
    
    ];
}
