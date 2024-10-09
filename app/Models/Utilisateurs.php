<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Modèle des utilisateurs
 *
 * @property string $uti_mail
 * @property string $uti_mdp
 */
class Utilisateurs
	extends Authenticatable {

	use HasFactory, Notifiable;

	protected $primaryKey = 'uti_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'uti_mail',
		'uti_mdp',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'uti_mdp',
		'remember_token',
	];

	/**
	 * Get the attributes that should be cast.
	 *
	 * @return array<string, string>
	 */
	protected function casts(): array {
		return [
			'email_verified_at' => 'datetime',
			'uti_mdp' => 'hashed',
		];
	}
}
