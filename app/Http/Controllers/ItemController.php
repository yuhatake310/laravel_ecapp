<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller {
	public function index() {
		$items = Item::get();
		return view('item.index', compact('items'));
	}

	public function detail($item_id) {
		$item = Item::find($item_id);
		return view('item.detail', compact('item'));
	}
}
