<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class masterController extends Controller
{
    public function master()
    {
        $user = auth()->user();

        return view('blog.master', compact('user'));
    }
}
