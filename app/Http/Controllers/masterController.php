<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class masterController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['master']]);
    }

    public function master(Request $request)
    {
        if (isset($_COOKIE["jwt"])) {
            if ($jwt = $_COOKIE["jwt"]) {
                $request->headers->set('Authorization', "Bearer" . $jwt); # code...
                $request->headers->set('X-Requested-With', "XMLHttpRequest"); # code...

            }
        }

        return view('blog.master',);
    }
    public function user(Request $request)
    {
        if (isset($_COOKIE["jwt"])) {
            if ($jwt = $_COOKIE["jwt"]) {
                $request->headers->set('Authorization', "Bearer" . $jwt); # code...
                $request->headers->set('X-Requested-With', "XMLHttpRequest"); # code...

            }
        }
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        return response()->json(auth()->user());
    }
}
