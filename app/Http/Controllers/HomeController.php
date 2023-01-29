<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function fetch()
    {
        dd('ok');
        $lists = ListItem::latest()->get();
        return view('welcome', compact('lists'));
    }
}
