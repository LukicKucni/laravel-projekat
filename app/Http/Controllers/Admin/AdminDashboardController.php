<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $ordersByDate = Order::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $chartData = [];

        foreach ($ordersByDate as $entry) {
            $chartData[] = [
                'date' => $entry->date, 
                'count' => $entry->count,
            ];
        }

        return view('admin.dashboard', compact('chartData'));
    }
}
