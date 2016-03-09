<nav class="navbar navbar-default navbar-static-top">
    <div class="auto-container" style="margin-top: 20px; margin-bottom: 5px">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{--For text logo please uncomment the following line and comment out the second one.--}}
            {{--<a class="navbar-brand" href="#">NPO Conference</a>--}}
            <a class="navbar-brand hidden-sm hidden-xs" href="/"><img src="/assets/frontend/img/npo.png" style="max-width: 170px;" alt=""></a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{isActive('/')}}"><a href="{{'/'}}">Home</a></li>
                <li class="{{isActive('about')}}"><a href="{{route('about')}}">About</a></li>
                <li class="{{isActive('schedule')}}"><a href="{{route('schedule')}}">Agenda</a></li>
                <li class="{{isActive('sponsors', 'sponsors/')}}"><a href="/sponsors">Sponsors</a></li>
                <li class="{{isActive('partners', 'partners/')}}"><a href="/partners">Partners</a></li>
                <li class="{{isActive('speakers', 'speakers/')}}"><a href="{{route('speakers')}}">Speakers</a></li>
                <li class="{{isActive('bookings')}}"><a href="/bookings">Book Your Tickets</a></li>
                <li><a href="/contact">Contact Us</a></li>
                @if(auth()->check())
                @else
                    <li style="border-left: 1px solid #e3e3e3;"><a href="/login"><i class="fa fa-lock"></i> Login</a></li>
                    <li><a href="/register"><i class="fa fa-unlock"></i> Register</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-righ  t">
                @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ getUser()->full_name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            @if(auth()->user()->isAdmin())
                                <li><a href="{{route('admin.dashboard')}}">Admin Section</a></li>
                            @endif
                                <li><a href="/logout">Log Out</a></li>
                        </ul>
                    </li>
                @endif
            </ul>

        </div>
    </div>
</nav>

