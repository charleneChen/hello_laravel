<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Party;
use App\Models\Site;
use Auth;
use Illuminate\Support\Facades\Redis;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $ticket_limit = Order::LIMIT;
        $site_id = 1;
        $total_seats = Site::find($site_id)->seats;
        $left_seats = Party::where('id', 1)->where('site_id', $site_id)->first()->available_seats;
        return view('orders.create', compact('ticket_limit','total_seats', 'left_seats', 'site_id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'number' => 'required|integer|between:1,5',
            'site_id' => 'required|integer',
            'seat' => 'required'
        ]);

        Auth::user()->orders()->create([
            'num' => $request->number,
            'site_id' => $request->site_id,
            'seat' => $request->seat,
        ]);
        $seats_array = explode(',', $request->seat);
        foreach ($seats_array as $seat) {
            Redis::srem('site_' . $request->site_id, $seat);
        }

        $party = Party::find(1);
        $party->available_seats = $party->available_seats - $request->number;
        $party->save();


        return redirect()->route('users.show', [Auth::user()]);
    }

    public function destroy(Order $order)
    {
        $this->authorize('destroy', Auth::user());
        $order->delete();
        session()->flash('success', '成功删除订单！');
        return back();
    }
}
