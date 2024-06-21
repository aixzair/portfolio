<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apercu
	extends Model {

	public $fillable = [
		"ape_id",
		"ape_image",
		"pro_id"
	];
}
