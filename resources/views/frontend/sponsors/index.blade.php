@extends('layouts.frontend')

@section('title')
    Event Sponsors {{ Carbon\Carbon::today()->year }}
@endsection
@section('intro')
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, culpa est ex fugi...
@endsection

@section('content')

    <div class="auto-container">
        <div class="divider20"></div>
        <div class="row">
            <div class="col-md-12">

                @unless(count($categories))
                    <div class="alert alert-danger" role="alert" style="background-color: #ef5505; border-color: #ef5505; color: white">
                        There are currently no sponsors available for this event, Please check back later
                    </div>
                @endif

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">

                        @foreach($categories as $category)
                            <hr width="100%">
                            <h6 style="color: #ef5505; font-size: 18px">Event {{$category->title}}</h6>
                            <hr width="100%">

                            @foreach($category->sponsor as $sponsor)
                                <div class="divider20"></div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-lg-3">
                                        <img class="thumbnail max-image" src="{{$sponsor->SponsorImage()}}" alt="{{$sponsor->slug}}">
                                    </div>
                                    <div class="col-md-9 col-sm-9 col-lg-9">
                                        <p><a href="{{route('sponsors.show', $sponsor->slug)}}" class="lg">{{$sponsor->title}}</a></p>
                                        {!! str_limit($sponsor->description, '270') !!}
                                        <p><a href="{{route('sponsors.show', $sponsor->slug)}}" class="btn btn-default">Visit Sponsor</a></p>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection