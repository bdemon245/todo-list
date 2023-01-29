<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;

class ListItemController extends Controller
{
    public function store(Request $req)
    {
        if ($req->item !== null) {
            $list = new ListItem();
            $list->item = $req->item;
            $list->save();
            return back();
        }else{
            return back();
        }
    }
    public function toggle($id)
    {
        $list = ListItem::find($id);
        $list->status = $list->status === 0 ? 1 : 0;
        $list->save();
        return back();
    }
    public function destroy($id)
    {
        $list = ListItem::find($id);
        $list->delete();
        return back();
    }
}
