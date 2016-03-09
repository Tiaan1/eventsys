@extends('layouts.frontend')

@section('title')
    Event Partners {{ Carbon\Carbon::today()->year }}
@endsection
@section('intro')
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, culpa est ex fugi...
@endsection

@section('content')

    <div class="auto-container">
        <div class="divider20"></div>
        <div class="row">
            <div class="col-md-12">

                @unless(count($partners))
                    <div class="alert alert-danger" role="alert" style="background-color: #ef5505; border-color: #ef5505; color: white">
                        There are currently no partners available for this event, Please check back later
                    </div>
                    @endif

                <div class="row">
                @if(count($partners))
                    @foreach($partners as $partner)
                        <div class="divider20"></div>
                        <div class="category-sponsor">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-lg-3">
                                    <img class="thumbnail max-image" src="{{$partner->PartnerImage()}}" alt="{{$partner->name}}">
                                </div>
                                <div class="col-md-9 col-sm-9 col-lg-9">
                                    <a href="{{route('partners.show', $partner->slug)}}" class="lg">{{$partner->title}}</a>
                                    <p>{!! str_limit($partner->description, '270') !!}</p>
                                    <a href="#"></a>
                                    <br>
                                    <a href="{{route('partners.show', $partner->slug)}}" class="btn btn-default">View Partner</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection