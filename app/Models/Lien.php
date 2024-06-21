<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lien
	extends Model {

	public $fillable = [
		"lien_id",
		"lien_contenu",
		"pro_id"
	];
}
