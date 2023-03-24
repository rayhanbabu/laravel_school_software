<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table='subjects';
    protected $fillable =[
        'subid','eiin','subcode','tecode','class','babu','subject'
        ,'tmark','cstatus','mstatus','pstatus','cmark','mmark','pmark','cfail','mfail','pfail'
    
    ];
}
