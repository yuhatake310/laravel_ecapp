<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller {
	public function index() {
		$items = \DB::table('items')->get();
		return view('item.index', compact('items'));
	}
}
