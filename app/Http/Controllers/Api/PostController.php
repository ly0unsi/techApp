<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
    public function index()
    {
        $posts = Post::all();
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
        $img = Image::make($request->photo)->resize(240, 200);
        $upload_path = 'post/';
        $image_url = $upload_path . $name;
        $img->save($image_url);
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->desc = $request->desc;
        $post->content = $request->content;
        $post->photo = $image_url;
        $post->category()->attach($request->category_id);

        Auth::user()->posts()->save($post);
        return response()->json('post Created succesfully');
    }
}
