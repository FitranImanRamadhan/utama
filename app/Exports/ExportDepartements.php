<?php

namespace App\Exports;

use App\Models\Departements;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDepartements implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Departements::all();
    }
}
