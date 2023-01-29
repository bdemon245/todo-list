<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;

class ListItemController extends Controller
{
    public function store(Request $req)
    {
        $list = new ListItem();
        $list->item = $req->item;
        $list->save();
        return back();
    }
}
