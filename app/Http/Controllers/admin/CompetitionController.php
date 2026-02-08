<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\CompetitionType;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitions = Competition::all();

        return view('admin.competition.index', compact('competitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $competition_types = CompetitionType::all();

        return view('admin.competition.create', compact('competition_types'));
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
    public function show(Competition $competition)
    {
        return view('admin.competition.show');
    }

    public function preview()
    {
        $competitions = Competition::all();

        return view('admin.competition.preview', compact('competitions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competition $competition)
    {
        return view('admin.competition.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competition $competition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competition $competition)
    {
        //
    }
}
