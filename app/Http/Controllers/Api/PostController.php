<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // all books
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }
    public function add(Request $request)
    {
        $postData = array();
        $postData['title'] = $request->title;
        $postData['desc'] = $request->desc;
        $postData['body'] = $request->body;
        $book = new Post();
        $book->create($postData);

        return response()->json('The book successfully added');
    }
}
