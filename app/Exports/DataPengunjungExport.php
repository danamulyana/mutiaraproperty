<?php

namespace App\Exports;

use App\Models\VisitorForm;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataPengunjungExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return VisitorForm::all();
    }
}
