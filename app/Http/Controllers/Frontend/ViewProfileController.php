<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;

class ViewProfileController extends Controller
{

    public function show($slug)
    {
        try{
            $user = User::whereSlug($slug)->firstorFail();
        }
        catch(ModelNotFoundException $e)
        {
            $message = Flash::message('The requested user profile was not found, Please try again.');
            return redirect('/')->with('message', $message);
        }
        return view('frontend.profiles.show', compact('user'));
    }
}
