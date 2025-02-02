<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tool
 * 
 * @property int $too_id
 * @property string $too_label
 * @property int $pro_id
 * 
 * @property Project $project
 *
 * @package App\Models
 */
class Tool extends Model
{
	protected $table = 'tool';
	protected $primaryKey = 'too_id';
	public $timestamps = false;

	protected $casts = [
		'pro_id' => 'int'
	];

	protected $fillable = [
		'too_label',
		'pro_id'
	];

	public function project()
	{
		return $this->belongsTo(Project::class, 'pro_id');
	}
}
