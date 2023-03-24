<?php
namespace App\Exports;

use App\Models\Admin;
use App\Models\Student;
use App\Models\School;

use DB;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport implements FromQuery
{
    use Exportable;

    public function __construct(int $eiin)
    {
        $this->eiin = $eiin;
      
    }

    

    public function query()
    {
        //return Invoice::query()->where('invoice_year', $this->year);
        //return Admin::query()->select(['name','mobile'])->where('eiin', $this->eiin);
        return School::query()->where('eiin', $this->eiin);
        //return Invoice::all();
       // $data= DB::table('Invoices')->where('invoice_year', $this->year)->get();
       // return $data;
    }
}