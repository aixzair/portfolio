<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point_travaille
	extends Model {

	protected $primaryKey = 'poi_id';
	
	protected $fillable = [
		"poi_nom",
		"poi_definition",
		"pro_id"
	];
}
