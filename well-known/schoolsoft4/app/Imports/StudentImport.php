<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Maintain;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;


class StudentImport implements ToModel
{

   
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
  
    public function model(array $row )
    {
       
        return new Student([
            'stu_id'=>$row[0],
            'eiin'=>$row[1],
            'roll'=>$row[2],
            'name'=>$row[3],
            'class'=>$row[4],
            'babu'=>$row[5],
            'section'=>$row[6],
            'moral'=>$row[7],
            'main'=>$row[8],
            'addi'=>$row[9],
            'father'=>$row[10],
            'mother'=>$row[11],
            'phone'=>$row[12],
            'address'=>$row[13],
            'image'=>$row[14],
        ]);
    }
}
