<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class masterController extends Controller

{
    public function __construct()
    {
        $this->middleware('getauth');
    }

    public function master(Request $request)
    {


        return view('blog.master',);
    }

    public function user(Request $request)
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        return response()->json(auth()->user());
    }
    public function getNots()
    {
        $nots = auth()->user()->unreadNotifications;
        return response()->json($nots);
    }
}
