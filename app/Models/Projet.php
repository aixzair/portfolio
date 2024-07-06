<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet
	extends Model {

	protected $primaryKey = "pro_id";

	protected $fillable = [
		"pro_titre",
		"pro_date_debut",
		"pro_date_fin",
		"pro_presentation",
		"pro_image",
		"ens_id"
	];
}
