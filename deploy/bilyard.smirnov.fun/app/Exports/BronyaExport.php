<?php

namespace App\Exports;

use App\Bronya;
use Maatwebsite\Excel\Concerns\FromCollection;

class BronyaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bronya::all();
    }
}
