<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\SeatNumberRequest;
use App\Models\Site;

class SeatNumbersController extends Controller
{
    public function select(SeatNumberRequest $request)
    {
        $number = $request->number;
        $site_id = $request->site_id;
        $seats = \Redis::sRandMember('site_' . $site_id, $number);

        return $this->response->array($seats)->setStatusCode(200);
    }
}
