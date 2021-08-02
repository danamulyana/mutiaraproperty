<?php

namespace App\Http\Livewire\Dashboard;

use App\Exports\DataSubscriberExport;
use App\Models\Subscriber;
use Carbon\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;

class EmailSubscriber extends Component
{
    use WithPagination;

    public function exportExcel()
    {
        return Excel::download(new DataSubscriberExport, 'Data_Subscribers_mutiaraProperty_'.Carbon::now()->timestamp.'.xlsx');
    }

    public function render()
    {
        $subscribers = Subscriber::orderBy('id','desc')->paginate(10);
        return view('livewire.dashboard.email-subscriber',['subscribers' => $subscribers]);
    }
}
