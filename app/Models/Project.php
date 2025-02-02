<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 * 
 * @property int $pro_id
 * @property string $pro_name
 * @property int|null $pro_year
 * @property string $pro_summary
 * @property bool $pro_picture
 * @property int $pro_nbPicture
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Link[] $links
 * @property Collection|Tool[] $tools
 *
 * @package App\Models
 */
class Project extends Model
{
	protected $table = 'project';
	protected $primaryKey = 'pro_id';

	protected $casts = [
		'pro_year' => 'int',
		'pro_picture' => 'bool',
		'pro_nbPicture' => 'int'
	];

	protected $fillable = [
		'pro_name',
		'pro_year',
		'pro_summary',
		'pro_picture',
		'pro_nbPicture'
	];

	public function links()
	{
		return $this->hasMany(Link::class, 'pro_id');
	}

	public function tools()
	{
		return $this->hasMany(Tool::class, 'pro_id');
	}
}
