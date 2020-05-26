<?php

namespace App\Exports;

use App\Center;
use Maatwebsite\Excel\Concerns\FromCollection;

class CentersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Center::all();
    }
}
