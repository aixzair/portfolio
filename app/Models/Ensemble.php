<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ensemble extends Model {
	use HasFactory;

	protected $fillable = ['ens_nom'];
}
