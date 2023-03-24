<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Maintain;
use App\Models\Subject;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;


class SubjectImport implements ToModel
{

   
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
  
    public function model(array $row )
    {
       
        return new Subject([
            'subid'=>$row[0],
            'eiin'=>$row[1],
            'subcode'=>$row[2],
            'tecode'=>$row[3],
            'class'=>$row[4],
            'babu'=>$row[5],
            'subject'=>$row[6],
            'tmark'=>$row[7],
            'cstatus'=>$row[8],
            'mstatus'=>$row[9],
            'pstatus'=>$row[10],
            'cmark'=>$row[11],
            'mmark'=>$row[12],
            'pmark'=>$row[13],
            'cfail'=>$row[14],
            'mfail'=>$row[15],
            'pfail'=>$row[16],
        ]);
    }
}
