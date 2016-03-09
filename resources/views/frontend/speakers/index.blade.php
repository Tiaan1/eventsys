@extends('layouts.frontend')

@section('title')
    Event Speakers {{ Carbon\Carbon::today()->year }}
@endsection
@section('intro')
   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, culpa est ex fugi...
@endsection

@section('content')

    <div class="auto-container">
        <div class="divider20"></div>
            <div class="row">
                <div class="col-md-12">

                    @unless(count($speakers))
                        <div class="alert alert-danger" role="alert" style="background-color: #ef5505; border-color: #ef5505; color: white">
                            There are currently no speakers available for this event, Please check back later
                        </div>
                        @endif

                    <div class="row">
                        @foreach($speakers as $speaker)
                            <div class="col-xs-12 col-sm-12 col-md-3">

                                <div class="thumbnail">
                                    <img style="min-width: 100%;" src="{{$speaker->SpeakerImage()}}">
                                        <div class="caption text-center">
                                            <a href="{{route('speakers.show', $speaker->slug)}}">
                                                <h8>{{str_limit($speaker->full_name, '20')}}</h8>
                                                <hr style="margin-top: 5px; margin-bottom: 5px">
                                                <p>{{str_limit($speaker->organisation, 30)}}</p>
                                            </a>
                                        </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-md-12">
                            {{$speakers->render()}}
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection