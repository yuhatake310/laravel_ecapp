<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	protected $fillable = [
		'user_id', 'item_id', 'item_quantity',
	];

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function item() {
		return $this->belongsTo('App\Item');
	}
}
