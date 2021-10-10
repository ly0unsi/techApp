<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
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
        $unreadNots = auth()->user()->unreadNotifications->count();
        $nots = auth()->user()->notifications;
        return response()->json([
            'unreadNots' => $unreadNots,
            'nots' => $nots
        ]);
    }
    public function markAsRead($userId)
    {
        $user = User::find($userId);

        $user->unreadNotifications->map(function ($n) {

            $n->markAsRead();
        });
    }
}
