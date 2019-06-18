<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller {
	public function index() {
		$items = \DB::table('items')->get();
		return view('item.index', compact('items'));
	}

	public function detail($item_id) {
		$item = \DB::table('items')->find($item_id);
		return view('item.detail', compact('item'));
	}
}
