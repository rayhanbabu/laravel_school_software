<?php

namespace App\Imports;
use App\Models\Student;
use App\Models\Maintain;
use App\Models\MarkInfo;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;


class MarkImport implements ToModel
{

    public function model(array $row)
    {
        return new Markinfo([
               'eiin'=>$row[0],
               'serial'=>$row[1],
               'class'=>$row[2],
               'babu'=>$row[3],
               'start'=>$row[4],
               'end'=>$row[5],
               'gpa'=>$row[6],
               'grade'=>$row[7],
               'gparange'=>$row[8],
        ]);
    }
}
