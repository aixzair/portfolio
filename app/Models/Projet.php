<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet
	extends Model {

	use HasFactory;

	protected $primaryKey = 'pro_id';

	protected $fillable = [
		'pro_nom',
		'pro_date',
		'pro_presentation',
		'pro_image',
		'pro_nbImage',
		'ens_id'
	];
}
