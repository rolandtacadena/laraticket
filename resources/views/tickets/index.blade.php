@extends('app')

@section('content')
    <div class="row">
        <!-- left nav -->
        @include('layouts._leftnav')

        <!--right side navigation-->
        <div id="ticket-table" class="large-10 medium-9 columns">
            <!--filter navigation-->
            @include('layouts._filternav')

            <!-- flash message for created ticket -->
            @include('partials.flash')

            <hr/>

            @if(count($tickets) > 0)
                <h4 class="subheader">{{ $header }} 
                    <b style="font-size: 20px;">({{ count($tickets) }})</b>
                </h4>
                <table id="ticket-list">
                    <thead>
                    <tr>
                        <th width="">Ticket #</th>
                        <th>Title</th>
                        <th width="">Description</th>
                        <th>Owner</th>
                        <th>Baclog</th>
                        <th width="">Type</th>
                        <th width="">Priority</th>
                        <th width="">Status</th>
                        <th width="">Dev LOE</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{!! link_to_route('show_ticket', $ticket->id, $ticket->id) !!}</td>
                            <td>{!! link_to_route('show_ticket', $ticket->title, $ticket->id) !!}</td>
                            <td>{{ $ticket->description }}</td>
                            <td>{!! link_to_route('tickets_by_user', $ticket->user->name, $ticket->user_id) !!}</td>
                            <td>{!! link_to_route('tickets_by_backlog', $ticket->backlog->name, $ticket->backlog_id) !!}</td>
                            <td>{!! link_to_route('tickets_by_type', $ticket->type, $ticket->type) !!}</td>
                            <td>{!! link_to_route('tickets_by_priority', $ticket->priority, $ticket->priority) !!}</td>
                            <td>{!! link_to_route('tickets_by_status', $ticket->status, $ticket->status) !!}</td>
                            <td>{{ $ticket->dev_loe }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!--filter navigation-->
                @include('layouts._filternav')
                <hr/>

                <!-- render pagination lnks -->
                {!! str_replace('/?', '?', $tickets->render()) !!}

            @else
                <h4 class="subheader">Sorry there were no tickets returned.</h4>
            @endif
        </div>
    </div>
@endsection
