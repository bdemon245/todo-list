<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function fetch()
    {
        $activeLists = ListItem::latest()->where('status', 1)->get();
        $inactiveLists = ListItem::latest()->where('status', 0)->get();
        // dd($inactivelists);
        return view('welcome', compact('activeLists', 'inactiveLists'));
    }
}
