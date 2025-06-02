<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ActivityLog;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('admin.createNupdate.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Category::create([
            'catName' => $request->name
        ]);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity_type' => 'store',
            'description' => "Created a new category: {$request->name}",
        ]);

        return redirect()->route('category.index')->with('message', 'Fund created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.createNupdate.updateCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $cat = Category::findOrFail($id);

        $cat->update([
            'catName' => $request->name
        ]);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity_type' => 'update',
            'description' => "Updated category with ID '{$request->id}' with this name '{$request->name}'",
        ]);

        return redirect()->route('category.index')->with('message', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);


        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity_type' => 'delete',
            'description' => "Deleted category: {$category->catName}",
        ]);

        $category->delete();

        return redirect()->route('category.index')->with('message', 'Category deleted successfully!');
    }
}
