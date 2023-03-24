<?php
namespace App\Exports;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Subject;
use DB;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubjectExport implements FromQuery
{

    use Exportable;
    public function __construct(int $eiin  , $class,$babu)
    {
        $this->eiin = $eiin;
        $this->class = $class;
        $this->babu = $babu;
      
    }

    

    public function query()
    {
    //return Invoice::query()->where('invoice_year', $this->year);
    return Subject::query()->select(['subid','eiin','subcode','tecode','class','babu','subject'
    ,'tmark','cstatus','mstatus','pstatus','cmark','mmark','pmark','cfail','mfail','pfail'
    ])->where('eiin', $this->eiin)
    ->where('class', $this->class)->where('babu', $this->babu);
     //return Invoice::all();
     // $data= DB::table('Invoices')->where('invoice_year', $this->year)->get();
     // return $data;
    }
}