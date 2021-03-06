<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCat(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255'
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->save();
    }
    public function index()
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        $cats = Category::all();

        return response()->json($cats);
    }
    public function catPosts($catName)
    {
        $category = Category::where('name', $catName)->first();
        $catPosts = Post::with('user')->where('category_id', $category->id)->latest()->get();
        return response()->json($catPosts);
    }
}
