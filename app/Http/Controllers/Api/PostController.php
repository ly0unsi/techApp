<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Like;
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
    public function edit(Request $request, $postSlug)
    {

        $request->validate([
            'slug' => 'required|max:255',
            'title' => 'required|max:255',
            'desc' => 'required|max:255',
            'category_id' => 'required',
            'content' => 'required',
        ]);
        $post = Post::where('slug', $postSlug)->first();
        $newPhoto = $request->newPhoto;
        if ($newPhoto) {

            $position = strpos($request->newPhoto, ';');
            $sub = substr($request->newPhoto, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = $request->slug . "." . $ext;

            $img = Image::make($request->newPhoto);

            $upload_path = 'images/posts/';

            $image_url = $upload_path . $name;

            $done = $img->save($image_url);
            if ($done) {
                unlink($post->photo);
                $post->title = $request->title;
                $post->slug = $request->slug;
                $post->desc = $request->desc;
                $post->content = $request->content;
                $post->photo = '/' . $image_url;
                $category = Category::where('id', $request->category_id)->first();
                $post->category()->associate($category);
                $user = Auth::user();
                $post->user()->associate($user);
                $post->update();
            }
        } else {
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->desc = $request->desc;
            $post->content = $request->content;
            $post->photo = $post->photo;
            $category = Category::where('id', $request->category_id)->first();

            $post->category()->associate($category);
            $user = Auth::user();
            $post->user()->associate($user);

            $post->update();
        }
    }
    // all books
    public function index(Request $request)
    {
        $mostLiked = Post::with('user', 'category', 'likes')->withCount('likes')->orderBy('likes_count', 'DESC')->get();
        $trend = Post::with('user', 'category', 'likes')->latest()->get();
        $userIds = auth()->user()->getUserIds();
        $followingsPosts = Post::whereIn('user_id', $userIds)->with('user', 'category', 'likes')->latest()->get();
        return response()->json([
            'trend' => $trend,
            'mostLiked' => $mostLiked,
            'followingsPosts' => $followingsPosts
        ]);
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
        $name = $request->slug . "." . $ext;

        $img = Image::make($request->photo);

        $upload_path = 'images/posts/';

        $image_url = $upload_path . $name;

        $img->save($image_url);
        $post = new Post();
        $post->title = $request->title;

        $post->slug = $request->slug;
        $post->desc = $request->desc;
        $post->content = $request->content;
        $post->photo = '/' . $image_url;
        $category = Category::where('id', $request->category_id)->first();

        $post->category()->associate($category);
        $user = Auth::user();
        $post->user()->associate($user);

        $post->save();
    }
    public function show($slug)
    {
        $post = Post::with('user', 'category', 'likes')->where('slug', $slug)->first();
        $sameCatPosts = Post::with('user', 'category')->where('category_id', $post->category_id)->latest()->get();
        $isLiked = false;
        if (auth()->user()) {
            if ($post->isLikedByLoggedInUser()) {
                $isLiked = true;
            };
        }
        $nextPost =  Post::where('id', '>', $post->id)->orderBy('id', 'asc')->first();
        $prevPost =  Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();

        return response()->json(
            [
                'post' => $post,
                'sameCat' => $sameCatPosts,
                'isLiked' => $isLiked,
                'nextPost' => $nextPost,
                'prevPost' => $prevPost
            ]
        );
    }
    public function like($postId)
    {
        $post = Post::find($postId);

        if ($post->isLikedByLoggedInUser()) {
            $res = Like::where([
                'user_id' => auth()->user()->id,
                'post_id' => $postId
            ])->delete();

            if ($res) {
                return response()->json([
                    'count' => Post::find($postId)->likes->count()
                ]);
            }
        } else {
            $like = new Like();

            $like->user_id = auth()->user()->id;
            $like->post_id = $postId;
            $like->username = auth()->user()->name;

            $like->save();
        }
    }
}
