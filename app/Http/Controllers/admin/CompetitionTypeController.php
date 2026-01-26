<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CompetitionType;
use Illuminate\Http\Request;

class CompetitionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->filter ?? 'earliest';

        if ($status == 'earliest') {
            $data = CompetitionType::orderBy('id', 'asc')->paginate(10);
        } elseif ($status == 'latest') {
            $data = CompetitionType::orderBy('id', 'desc')->paginate(10);
        }

        return view('admin.competition-type.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $competitionType = CompetitionType::all();
        return view('admin.competition-type.create', compact('competitionType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = [
            'name' => $request->name,
        ];

        CompetitionType::create($data);
        return redirect()->route('admin.competition-type.index')->with('success', 'data successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(CompetitionType $competitionType)
    {
        return view('admin.competition-type.show', compact('competitionType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompetitionType $competitionType)
    {
        return view('admin.competition-type.edit', compact('competitionType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompetitionType $competitionType)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = [
            'name' => $request->name,
        ];

        $competitionType->update($data);
        return redirect()->route('admin.competition-type.index')->with('success', 'data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompetitionType $competitionType)
    {
        $competitionType->delete();
        return redirect()->route('admin.competition-type.index')->with('success', 'data successfully deleted');
    }
}
