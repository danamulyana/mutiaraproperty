<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\ActivityLog;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use App\Models\Visitor;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $news = Post::all();
        $user = User::all();
        $visitor_count = Visitor::where('date', '=' , today())->count();
        $product = Product::all()->count();
        $activity_log = ActivityLog::with('user')->limit(4)->orderBy('id','desc')->get();

        $tes = Visitor::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');
        return view('livewire.dashboard',[
            'news' => $news,
            'user' => $user,
            'activity_log' => $activity_log,
            'visitor_count' => $visitor_count,
            'product' => $product,
            'tes' => $tes,
            ])->layout('layouts.app');
    }
}
