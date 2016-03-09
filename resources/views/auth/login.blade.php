@extends('layouts.frontend')

@section('content')

    <div class="container"  style="background: url('/assets/frontend/images/uni.jpg') no-repeat; width: 100%; height: 50%; min-height: 650px">
        <div class="row">
            <div class="divider40" style="padding-top: 150px"></div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default" style="background-color: rgba(255, 255, 255, 0.92);">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Welcome back, Please login</h3>
                    </div>
                    <div class="panel-body">

                        {!! Form::open(['Method' => 'Post']) !!}
                            <fieldset>

                                <div class="form-group">
                                    {!! form::label('email', 'Email Address') !!}
                                    {!! Form::input('text', 'email', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! form::label('password', 'Password') !!}
                                    {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me" checked>Remember Me
                                    </label>
                                </div>

                                <div class="form-group">
                                    {!! Form::submit('Login', ['class' => 'btn custom-btn-theme btn-block']) !!}
                                </div>
                            </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection