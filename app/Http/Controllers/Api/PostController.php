<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('getauth');
    }
    // all books
    public function index(Request $request)
    {
        $posts = Post::with('user', 'category')->latest()->get();
        return response()->json($posts);
    }
    public function add(Request $request)
    {
        $request->validate([
            'slug' => 'required|max:255',
            'title' => 'required|max:255',
            'desc' => 'required|max:255',
            'category_id' => 'required',
            'photo' => 'required',
            'content' => 'required',

        ]);

        $position = strpos($request->photo, ';');
        $sub = substr($request->photo, 0, $position);
        $ext = explode('/', $sub)[1];

        $name = time() . "." . $ext;

        $img = Image::make($request->photo);

        $upload_path = 'images/posts';

        $image_url = $upload_path . $name;

        $img->save($image_url);
        $post = new Post();
        $post->title = $request->title;

        $post->slug = $request->slug;
        $post->desc = $request->desc;
        $post->content = $request->content;
        $post->photo = $image_url;
        $category = Category::where('id', $request->category_id)->first();

        $post->category()->associate($category);
        $user = Auth::user();
        $post->user()->associate($user);

        $post->save();
    }
    public function show($slug)
    {
        $post = Post::with('user', 'category')->where('slug', $slug)->first();
        return response()->json($post);
    }
}
