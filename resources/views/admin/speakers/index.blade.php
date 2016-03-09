@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('admin.partials.page-header', ['PageHeader' => 'speakers'])

        <div class="row">
            <div class="col-md-10 col-xs-10 col-lg-10 col-sm-10">
                @if(count($speakers))
                    <div class="dataTable_wrapper">
                        <table class="table table-hover table-bordered" id="speakers-table">
                            <thead>
                            <tr>
                                <th>Speaker full name</th>
                                <th>Job title & organization</th>
                                <th class="text-center">Speaker created at</th>
                                <th class="text-center">Speaker profile</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($speakers as $speaker)
                                <tr>
                                    <td>{{$speaker->full_name}}</td>
                                    <td>{{$speaker->job_title}}, {{$speaker->organisation}}</td>
                                    <td class="text-center">{{$speaker->created_at->toFormattedDateString()}}</td>
                                    <td class="text-center no-hover"><a href="{{route('speakers.show', $speaker->slug)}}" target="_blank">View Profile</a></td>
                                    <td class="text-center no-hover"><a href="{{route('admin.speakers.edit', $speaker->slug)}}">Edit Speaker</a></td>

                                    <td class="text-center">
                                        {!! Form::open(['Method' => 'destroy', 'route'  => ['admin.speakers.destroy']]) !!}
                                        <div class="form-group">
                                            <input type="hidden" name="slug" value="{{ $speaker->slug }}">
                                            {!! Form::submit('X', ['class' => 'delete btn btn-xs btn-danger']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    There is no available speakers, would you like to add
                    <a href="{{route('admin.speaker.create')}}" style="text-decoration: none">some </a> ?
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#speakers-table').DataTable({
                responsive: true
            });
        });
    </script>
@endsection