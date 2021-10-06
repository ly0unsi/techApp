<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('getauth');
    }
    public function index($username)
    {
        $profile = User::where('name', $username)->first();
        return response()->json($profile);
    }
    public function edit($username)
    {

        $profile = User::where('name', $username)->first();
        if (request()->profilePic) {
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
            $profile->update();
        } else {
            $profile->name = request()->name;
            $profile->email = request()->email;
            $profile->update();
        }
    }
}
