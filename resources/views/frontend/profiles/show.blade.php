@extends('layouts.frontend')

@section('title')
    {{ $user->full_name }}
@endsection
@section('intro')
    {{ $user->profile->bio }}
@endsection

@section('content')
    <div class="container visible-lg">
        <div class="divider20"></div>
           <div class="col-md-12">
               <p>Location: {{$user->profile->location}}</p>
               <p>Twitter Username:    {{$user->profile->twitter_username}}</p>
               <p>Facebook Username:   {{$user->profile->facebook_username}}</p>
               <p>Github Username:     {{$user->profile->github_username}}</p>

                @if(auth()->check() && getUser()->id == $user->id)
                   <a href="{{route('profile.edit', $user->slug)}}" class="btn btn-default">Update My Profile</a>
                @endif

           </div>
    </div>
@endsection