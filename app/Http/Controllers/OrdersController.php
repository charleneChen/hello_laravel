<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'number' => 'required|integer|between:1,5'
        ]);

        Auth::user()->orders()->create([
            'num' => $request->number,
        ]);
        return redirect()->route('users.show', [Auth::user()]);
    }

    public function destroy(Order $order)
    {
        $this->authorize('destroy', $user);
        $order->delete();
        session()->flash('success', '成功删除订单！');
        return back();
    }
}
