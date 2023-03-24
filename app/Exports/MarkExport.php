<?php
namespace App\Exports;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Markinfo;
use DB;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class MarkExport implements FromQuery
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
    return Markinfo::query()->select([ 'eiin',
    'serial',
    'class',
    'babu',
    'start',
    'end',
    'gpa',
    'grade',
    'gparange',
    ])->where('eiin', $this->eiin)
    ->where('class', $this->class)->where('babu', $this->babu);
     //return Invoice::all();
     // $data= DB::table('Invoices')->where('invoice_year', $this->year)->get();
     // return $data;
    }
}