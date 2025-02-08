<?php

namespace App\Managers;

use App\Models\Link;
use App\Models\Project;
use App\Models\Tool;
use Illuminate\Database\Eloquent\Collection;

class ProjectManager {
	public Project $details;
	public Collection|array $links;
	public Collection|array $tools;

	/**
	 * Find all data for a project
	 *
	 * @param string $id
	 * @return ProjectManager
	 */
	public static function findOrFail(string $id): ProjectManager {
		$project = new ProjectManager();

		$project->details = Project::findOrFail($id);
		$project->links = Link::where('pro_id', $id)->get();
		$project->tools = Tool::where('pro_id', $id)->get();

		return $project;
	}
}
