<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class MessagesController extends Controller
{
    public function index()
    {
        $currentUserId = Auth::user()->id;
        // All threads, ignore deleted/archived participants
        $threads = Thread::getAllLatest()->get();
        // All threads that user is participating in
        // $threads = Thread::forUser($currentUserId)->latest('updated_at')->get();
        // All threads that user is participating in, with new messages
        // $threads = Thread::forUserWithNewMessages($currentUserId)->latest('updated_at')->get();
        return view('frontend.profiles.messenger.index', compact('threads', 'currentUserId'));
    }
}
