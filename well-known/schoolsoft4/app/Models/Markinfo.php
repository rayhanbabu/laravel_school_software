<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Markinfo extends Model
{
    use HasFactory;
    protected $table='markinfos';
    protected $fillable =[
       'eiin',
       'serial',
       'class',
       'babu',
       'section',
       'start',
       'end',
       'gpa',
       'grade',
       'gparange',
    ];
}
