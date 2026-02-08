<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CompetitionTopicCategory;
use Illuminate\Http\Request;

class CompetitionTopicCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CompetitionTopicCategory::all();

        return view('admin.competition-topic-category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.competition-topic-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CompetitionTopicCategory $competitionTopicCategory)
    {
        return view('admin.competition-topic-category.show', compact('competitionTopicCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompetitionTopicCategory $competitionTopicCategory)
    {
        return view('admin.competition-topic-category.edit', compact('competitionTopicCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompetitionTopicCategory $competitionTopicCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompetitionTopicCategory $competitionTopicCategory)
    {
        //
    }
}
