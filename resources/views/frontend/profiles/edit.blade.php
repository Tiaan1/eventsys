@extends('layouts.frontend')

@section('title')
    {{ $user->full_name }}
@endsection
@section('intro')
    Edit Profile
@endsection

@section('content')
    {{--<div class="container visible-lg">--}}
        {{--<div class="divider20"></div>--}}
        {{--<div class="col-md-12">--}}
            {{--{!! Form::model($user->profile, ['Method' => 'Post', 'route' => ['profile.update', $user->slug]]) !!}--}}
            {{--<div class="form-group">--}}
                {{--{!! form::label('location', 'Location') !!}--}}
                {{--{!! Form::input('text', 'location', null, ['class' => 'form-control']) !!}--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--{!! form::label('twitter_username', 'Twitter Username') !!}--}}
                {{--{!! Form::input('text', 'twitter_username', null, ['class' => 'form-control']) !!}--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--{!! form::label('bio', 'Bio') !!}--}}
                {{--{!! Form::textarea('bio', null, ['class' => 'form-control']) !!}--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--{!! Form::submit('Update', ['class' => 'btn btn-default']) !!}--}}
            {{--</div>--}}
            {{--{!! Form::close() !!}--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection