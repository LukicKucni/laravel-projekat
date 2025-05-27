<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Magazine;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store($id)
    {
        $magazine = Magazine::findOrFail($id);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->magazine_id = $magazine->id;
        $order->quantity = 1;
        $order->total_price = $magazine->price;
        $order->save();

        return redirect()->back()->with('success', 'Magazin je dodat u tvoje porudžbine!');
    }

    public function index()
    {
        $orders = Auth::user()
            ->orders()
            ->where('status', 'pending')
            ->with('magazine')
            ->get();

        return view('orders.index', compact('orders'));
    }


    public function edit($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $order->quantity = $request->quantity;
        $order->total_price = $order->magazine->price * $request->quantity;
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Porudžbina je uspešno ažurirana!');
    }

    public function destroy($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Porudžbina je uspešno obrisana!');
    }
    public function checkout()
{
    Auth::user()->orders()
        ->where('status', 'pending')
        ->update(['status' => 'completed']);

    return redirect()->route('orders.index')->with('success', 'Porudžbina uspešno završena!');
}

}
