<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point_travaille
	extends Model {
	public $fillable = [
		"poi_id",
		"poi_nom",
		"poi_definition",
		"pro_id"
	];
}
