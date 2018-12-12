<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\SeatNumberRequest;
use App\Models\Site;

class SeatNumbersController extends Controller
{
    public function select(SeatNumberRequest $request)
    {
        $number = $request->number;
        $party_id = $request->party_id;
        $seats = \Redis::srandmember('party_' . $party_id, $number);

        return $this->response->array($seats)->setStatusCode(200);
    }
}
