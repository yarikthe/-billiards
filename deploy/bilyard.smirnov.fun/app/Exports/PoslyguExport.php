<?php

namespace App\Exports;

use App\Poslygu;
use Maatwebsite\Excel\Concerns\FromCollection;

class PoslyguExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Poslygu::all();
    }
}
