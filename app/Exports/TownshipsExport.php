<?php

namespace App\Exports;

use App\Township;
use Maatwebsite\Excel\Concerns\FromCollection;

class TownshipsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Township::all();
    }
}
