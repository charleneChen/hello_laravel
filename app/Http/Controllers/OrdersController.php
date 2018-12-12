<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use App\Models\User;
use App\Models\Order;
use App\Models\Party;
use App\Models\Site;
use Auth;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Party $party)
    {
        $ticket_limit = Order::LIMIT;
        $total_seats = Site::find($party->id)->seats;
        $left_seats = Party::where('id', 1)->where('site_id', $party->id)->first()->available_seats;
        return view('orders.create', compact('ticket_limit','total_seats', 'left_seats', 'site_id', 'party'));
    }

    public function store(Party $party, Request $request)
    {
        $this->validate($request, [
            'number' => 'required|integer|between:1,5',
            'party_id' => 'required|integer',
            'seat' => 'required'
        ]);

        Auth::user()->orders()->create([
            'num' => $request->number,
            'party_id' => $request->party_id,
            'seat' => $request->seat,
        ]);
        $seats_array = explode(',', $request->seat);
        foreach ($seats_array as $seat) {
            Redis::srem('party_' . $request->party_id, $seat);
        }

        $party = Party::find($request->party_id);
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

    public function index(Party $party, User $currentUser)
    {
        $this->authorize('show_admin', $currentUser);
        $orders = Order::where('party_id', $party->id)->paginate(10);
        return view('orders.index', compact('orders'));
    }
}
