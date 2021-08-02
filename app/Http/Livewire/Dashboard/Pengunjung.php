<?php

namespace App\Http\Livewire\Dashboard;

use App\Exports\DataPengunjungExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\VisitorForm;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Pengunjung extends Component
{
    use WithPagination;

    public function exportExcel()
    {
        return Excel::download(new DataPengunjungExport, 'Data Pengunjung_mutiaraProperty_'.Carbon::now()->timestamp.'.xlsx');
    }
    public function render()
    {
        $pengunjungs = VisitorForm::orderBy('id','desc')->paginate(10);
        return view('livewire.dashboard.pengunjung',['pengunjungs' => $pengunjungs]);
    }
}
