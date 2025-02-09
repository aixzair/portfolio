<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Project;
use App\Models\Tool;
use Illuminate\Http\Request;

class ProjectController
	extends BaseController {

	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		return view("project.index", [
			"projects" => Project::all()
		]);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(int $id) {
		return view("project.show", [
			"project" => Project::with(['links', 'tools'])->findOrFail($id)
		]);
	}

	public function edit(int $id) {
		return view("project.edit", [
			"project" => Project::with(['links', 'tools'])->findOrFail($id)
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, int $id) {
		$project = Project::with(['links', 'tools'])->findOrFail($id);

		$validated = $request->validate([
			'name' => 'required|string|max:50',
			'year' => 'required|integer|min:2000|max:2100',
			'summary' => 'required|max:200',
			'links' => 'array',
			'links.*.id' => 'nullable|integer|exists:link,lin_id',
			'links.*.label' => 'required|string|max:100',
			'links.*.href' => 'required|string|max:100',
			'tools' => 'array',
			'tools.*.id' => 'nullable|integer|exists:tool,too_id',
			'tools.*.label' => 'required|string|max:50'
		]);

		// Update project
		$project->update([
			'pro_name' => $validated['name'],
			'pro_year' => $validated['year'],
			'pro_summary' => $validated['summary']
		]);

		// Update links
		$existingLinks = collect($validated['links'])->pluck('id')->filter();
		$project->links()->whereNotIn('lin_id', $existingLinks)->delete();

		$links = collect($validated['links'])->map(fn($link) => [
			'lin_id' => $link['id'] ?? null,
			'pro_id' => $project->pro_id,
			'lin_label' => $link['label'],
			'lin_href' => $link['href']
		])->toArray();
		Link::upsert($links, ['lin_id'], ['lin_label', 'lin_href']);

		// Update tools
		$existingTools = collect($validated['tools'])->pluck('id')->filter();
		$project->tools()->whereNotIn('too_id', $existingTools)->delete();

		$tools = collect($validated['tools'])->map(fn($tool) => [
			'too_id' => $tool['id'] ?? null,
			'pro_id' => $project->pro_id,
			'too_label' => $tool['label']
		])->toArray();
		Tool::upsert($tools, ['too_id'], ['too_label']);


		return redirect()
			->route('project.show', $project->pro_id)
			->with('success', 'Projet mis à jour avec succès.');
	}
}