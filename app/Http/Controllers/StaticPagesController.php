<?php

namespace App\Http\Controllers;

use App\Models\Party;

class StaticPagesController extends Controller
{
    public function home()
    {
        $party= Party::find(1);
        return view('static_pages/home', compact('party'));
    }

    public function help()
    {
        return view('static_pages/help');
    }

    public function about()
    {
        return view('static_pages/about');
    }
}
