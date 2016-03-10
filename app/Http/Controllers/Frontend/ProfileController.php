<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileFormRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Laracasts\Flash\Flash;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('profile');
    }

    public function edit($slug)
    {
        $user = $this->findUser($slug);
        return view('frontend.profiles.edit', compact('user'));
    }

    public function update(ProfileFormRequest $request, $slug)
    {
        $user = $this->findUser($slug);
        $input = $request->only('location', 'bio', 'twitter_username', 'facebook_username', 'github_username');

        $user->profile->fill($input)->save();
        Flash::message('Your Profile has been updated');

        return redirect()->back();
    }

    protected function findUser($slug)
    {
        $user = User::whereSlug($slug)->first();
        return $user;
    }
}
