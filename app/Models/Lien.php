<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lien
	extends Model {

	use HasFactory;

	public $primaryKey = 'lien_id';
	public $fillable = [
		'lien_nom',
		'lien_destination',
		'pro_id'
	];
}
