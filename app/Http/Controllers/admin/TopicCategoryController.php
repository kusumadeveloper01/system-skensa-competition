<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TopicCategory;
use Illuminate\Http\Request;

class TopicCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = $request->filter ?? 'earliest';

        if ($status == 'earliest') {
            $data = TopicCategory::orderBy('id', 'asc')->paginate(10);
        } elseif ($status == 'latest') {
            $data = TopicCategory::orderBy('id', 'desc')->paginate(10);
        }

        return view('admin.topic-category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.topic-category.create');
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

        TopicCategory::create($data);

        return redirect()->route('admin.topic-category.index')->with('success', 'Topic Category Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TopicCategory $topic_category)
    {
        return view('admin.topic-category.show', compact('topic_category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TopicCategory $topic_category)
    {
        return view('admin.topic-category.edit', compact('topic_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TopicCategory $topic_category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = [
            'name' => $request->name,
        ];

        $topic_category->update($data);

        return redirect()->route('admin.topic-category.index')->with('success', 'Topic Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TopicCategory $topic_category)
    {
        $topic_category->delete();

        return redirect()->route('admin.topic-category.index')->with('success', 'Topic Category Deleted Successfully!');
    }
}
