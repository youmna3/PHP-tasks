<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    function index()
    {
        $categories = Category::paginate(2);
        return view('admin.categories.index', compact('categories'));
        //return view('admin.categories.index')->with('categories', Category::all());
    }
    function create()
    {
        return view('admin.categories.create');
    }
    function store(Request $request)
    {
        $request->validate(Category::$rules);
        $imageUrl = $request->file('image')->store('categories', ['disk' => 'public']);
        $category = new Category;
        $category->fill($request->post());
        $category['image'] = $imageUrl;
        $category->save();
        return redirect()->route('categories.index');
    }
    function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }
    function update($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $request->validate(Category::$rules);
        $imageUrl = $request->file('image')->store('categories', ['disk' => 'public']);
        $category->fill($request->post());
        $category['image'] = $imageUrl;
        $category->save();
        return redirect()->route('categories.index');
    }
    function destroy($id)
    {
        $category = Category::findOrFail($id);
        Category::destroy($id);
        return redirect()->route('categories.index')->with('success', 'Record has been deleted successfully!');
    }
}