<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\Viewer;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderByDesc("id")
            ->get();

        return view("admin.categories.index", compact("categories"));
    }

    public function create()
    {

        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $file = $request->file('image');
        $pathImages = public_path('images/games/');
        $fileName = $file->getClientOriginalName();
        $file->move($pathImages, $fileName);
        Category::create([
            'name' => $request->name,
            'image' => $fileName
        ]);

        return back()->with('success', '1');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return back();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $pathImages = public_path('images/games/');
            $fileName = $file->getClientOriginalName();
            $file->move($pathImages, $fileName);
            Category::findOrFail($id)->update([
                'name' => $request->name,
                'image' => $fileName
            ]);
        } else {
            Category::findOrFail($id)->update([
                'name' => $request->name,
            ]);
        }

        return back()->with('success', '1');
    }
}
