<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Notifications\userFollowed;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('getauth');
    }
    public function follow($profileId)
    {
        $profile = User::find($profileId);

        if ($profile->isFollowedBy(auth()->user())) {
            $profile->followers()->detach(auth()->user()->id);
            $count = $profile->followers()->count();
        } else {
            $profile->followers()->attach(auth()->user()->id);
            $profile->notify(new userFollowed(auth()->user()));
            $count = $profile->followers()->count();
        }
    }
    public function index($username)
    {
        $profile = User::where('name', $username)->with('posts', 'posts.category')->first();

        $followers = $profile->followers()->withCount([
            'followers as following' => function ($q) {
                return $q->where('follower_id', auth()->user()->id);
            }
        ])->withCasts(['following' => 'boolean'])->get();
        $followings = $profile->followings()->withCount([
            'followers as following' => function ($q) {
                return $q->where('follower_id', auth()->user()->id);
            }
        ])->withCasts(['following' => 'boolean'])->get();
        $profilePosts = Post::where('user_id', $profile->id)->with('category')->latest()->get();
        $isFollowing = false;
        if ($profile->isFollowedBy(auth()->user())) {
            $isFollowing = true;
        }
        return response()->json([
            'profile' => $profile,
            'profilePosts' => $profilePosts,
            'isFollowing' => $isFollowing,
            'followings' => $followings,
            'followers' => $followers
        ]);
    }
    public function edit($username)
    {

        $profile = User::where('name', $username)->first();

        $position = strpos(request()->profilePic, ';');
        $sub = substr(request()->profilePic, 0, $position);
        $ext = explode('/', $sub)[1];

        $name = request()->name . "." . $ext;

        $img = Image::make(request()->profilePic);

        $upload_path = 'images/users/';

        $image_url = $upload_path . $name;

        $img->save($image_url);
        $profile->name = request()->name;
        $profile->email = request()->email;
        $profile->profilePic = '/' . $image_url;
        $profile->bio = request()->bio;
        $profile->update();
    }
}
