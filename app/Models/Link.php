<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Link
 * 
 * @property int $lin_id
 * @property string $lin_label
 * @property string $lin_href
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $pro_id
 * 
 * @property Project $project
 *
 * @package App\Models
 */
class Link extends Model
{
	protected $table = 'link';
	protected $primaryKey = 'lin_id';

	protected $casts = [
		'pro_id' => 'int'
	];

	protected $fillable = [
		'lin_label',
		'lin_href',
		'pro_id'
	];

	public function project()
	{
		return $this->belongsTo(Project::class, 'pro_id');
	}
}
