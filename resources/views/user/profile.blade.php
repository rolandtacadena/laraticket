@extends('app')

@section('content')

    <div class="row">
        <div class="large-2 columns profile-container-left">
            <div class="profile">
                <div class="profile-img">
                    @if(!Auth::user()->profile_photo)
                        <img src="{{ URL::asset('img/user/profile-pics/default-img-profile.png') }}" alt=""/>
                    @else
                        <img src="{{ URL::asset('img/user/profile-pics/' . Auth::user()->profile_photo) }}" alt=""/>
                    @endif
                </div>
                @if(!Auth::user()->profile_photo)
                    <div class="upload-photo">
                        <form method="post" action="{{ url('user/profile/upload-photo') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="file" name="profile-pic"/>
                            <input class="button tiny" type="submit" value="Upload Photo"/>
                        </form>
                    </div>
                @endif
                <div class="profile-details">
                    <div class="personal-info">
                        <ul>
                            <li><b>{{ Auth::user()->name }}</b></li>
                            <li>Role: <b>{{ Auth::user()->role }}</b></li>
                        </ul>
                    </div>
                    <hr/>
                    <div class="ticket-actions">
                        <ul>
                            <li>{!! link_to_route('create_ticket', 'Create Ticket') !!}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="large-10 columns profile-container-right">

            <!-- include errors -->
            @include('errors.list')

            <!-- flash message for created ticket -->
            @include('partials.flash')

            @if(count($user_all_tickets) > 0)
                <h4 class="subheader">Your ticket lists</h4>
                <hr/>
                <table id="ticket-list">
                    <thead>
                    <tr>
                        <th width="">Ticket #</th>
                        <th>Title</th>
                        <th width="">Description</th>
                        <th>Baclog</th>
                        <th width="">Type</th>
                        <th width="">Priority</th>
                        <th width="">Status</th>
                        <th width="">Dev LOE</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user_all_tickets as $ticket)
                        <tr>
                            <td>{!! link_to_route('show_ticket', $ticket->id, $ticket->id) !!}</td>
                            <td>{!! link_to_route('show_ticket', $ticket->title, $ticket->id) !!}</td>
                            <td>{{ $ticket->description }}</td>
                            <td>{!! link_to_route('tickets_by_backlog', $ticket->backlog->name, $ticket->backlog_id) !!}</td>
                            <td>{!! link_to_route('tickets_by_type', $ticket->type, $ticket->type) !!}</td>
                            <td>{!! link_to_route('tickets_by_priority', $ticket->priority, $ticket->priority) !!}</td>
                            <td>{!! link_to_route('tickets_by_status', $ticket->status, $ticket->status) !!}</td>
                            <td>{{ $ticket->dev_loe }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- render pagination lnks -->
                {!! str_replace('/?', '?', $user_all_tickets->render()) !!}

            @else
                <h4 class="subheader">Sorry there were no tickets returned.</h4>
            @endif

        </div>
    </div>
@endsection