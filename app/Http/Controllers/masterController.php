<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class masterController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['/']]);
    }

    public function master(Request $request)
    {
        return view('blog.master',);
    }
}
