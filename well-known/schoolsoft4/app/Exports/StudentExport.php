<?php
namespace App\Exports;

use App\Models\Admin;
use App\Models\Student;

use DB;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentExport implements FromQuery
{
    use Exportable;

    public function __construct(int $eiin ,$babu,$class,$section)
    {
        $this->eiin = $eiin;
        $this->class = $class;
        $this->babu = $babu;
        $this->section = $section;
      
    }

    

    public function query()
    {

    //return Invoice::query()->where('invoice_year', $this->year);
    return Student::query()->select(['stu_id','eiin','roll','name','class','babu','section'
      ,'moral','main','addi' ,'father','mother','phone','address','image','birth_date'
          ])->where('eiin', $this->eiin)
         ->where('class', $this->class)->where('babu', $this->babu)
        ->where('section', $this->section);
     //return Student::all();
     // $data= DB::table('Invoices')->where('invoice_year', $this->year)->get();
     // return $data;
    }
}