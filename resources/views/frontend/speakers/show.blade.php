@extends('layouts.frontend')

@section('content')

@section('title')
    {{$speaker->full_name}}
@endsection
@section('intro')
    {{str_limit($speaker->job_title)}}, {{$speaker->organisation}}
@endsection

<div class="container">
    <div class="row">
        <div class="divider20"></div>
        <div class="row">
            <div class="col-md-3">
                <div class="thumbnail">
                    <img style="min-width: 100%;" src="{{$speaker->SpeakerImage()}}">
                </div>
                <a href="{{url()->previous()}}" class="btn btn-default btn-block">Back To Speakers</a>
            </div>

            <div class="col-md-9">
                <p>{!! $speaker->bio !!}</p>

                <hr>
                <i class="fa fa-globe" style="color: #e3e3e3"></i>
                Website: {{str_limit(($speaker->website)? : "No website Supplied", 25)}} <span class="solid-line"></span>
                <i class="fa fa-envelope" style="color: #e3e3e3"></i>
                Email Address: {{str_limit(($speaker->email)? : "No email Supplied", 15)}} <span class="solid-line"></span>
                <i class="fa fa-phone" style="color: #e3e3e3"></i>
                Contact Number:  {{($speaker->contact_number)? : "No number Supplied"}}
                <hr>
            </div>
        </div>
    </div>
</div>
@endsection