@extends('app')

@section('content')
    <!-- left nav -->
    @include('layouts._leftnav')

    <div class="general-right-column large-10 medium-9 columns">

        <!--filter navigation-->
        @include('layouts._filternav')

        <!-- flash message for updated ticket -->
        @include('partials.flash')

        <hr/>

        <!-- include errors -->
        @include('errors.list')

        <h4 class="ticket-title subheader">#{{ $ticket->id . " - " . $ticket->title }}</h4>

        <hr/>

        @can('my-ticket', $ticket)
            <p> - <b>This ticket belongs to you.</b></p>
        @endcan

        <div class="ticket-prop">
            <ul>
                <li>Ticket Description: <span>{{ $ticket->description }}</span></li>
                <li>Ticket Type: <span>{!! link_to_route('tickets_by_type', $ticket->type, $ticket->type) !!}</span></li>
                <li>Ticket Priority: <span>{!! link_to_route('tickets_by_priority', $ticket->priority, $ticket->priority) !!}</span></li>
                <li>Ticket Dev Assigned: <span>{!! link_to_route('tickets_by_user', $ticket->user->name, $ticket->user_id) !!}</span></li>
                <li>Ticket Dev LOE: <span>{{ $ticket->dev_loe }}</span></li>
                <li>Ticket Status: <span>{!! link_to_route('tickets_by_status', $ticket->status, $ticket->status) !!}</span></li>
                <li>Ticket Backlog: <span>{!! link_to_route('tickets_by_backlog', $ticket->backlog->name, $ticket->backlog_id) !!}</span></li>
            </ul>
        </div>
        <hr/>
        <div class="update-ticket">
            <div class="ticket-form">
                {!! Form::model($ticket, ['method' => 'PATCH', 'action' => ['TicketsController@update', $ticket->id]]) !!}
                @include('tickets.form', ['submiButtonText' => 'Update Article', 'formLabel' => 'Edit Article', 'ticket_action' => 'edit'])
                {!! Form::close() !!}
            </div>
        </div>
        @if(Auth::check())
            <div class="form-ticket-comment">
                {!! Form::model($comment = new \App\Comment, ['action' => ['CommentsController@store', $ticket->id]]) !!}
                    {!! Form::hidden('ticket_action', 'comment') !!}
                    <fieldset>
                        <legend><i class="icons fi-page-add"></i> Add Comment</legend>
                        <div class="row">
                            <div class="large-12 columns">
                                {!! Form::label('comment', 'Add Comment to this ticket:') !!}
                                {!! Form::textarea('comment', null, ['placeholder' => 'Add comment', 'rows' => 2]) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="large-12 columns">
                                {!! Form::submit('Add Comment', ['class' => 'right button tiny']) !!}
                            </div>
                        </div>
                    </fieldset>
                {!! Form::close() !!}
            </div>
        @else
            <p>In order to create comment for this ticket, you must be logged in. <a href="{{ url('auth/login') }}">Log in</a> or
                <a href="{{ url('auth/register') }}">Register</a></p>
        @endif

        <div class="comment-list">
            <h5 class="subheader">Ticket Comments ({{ count($ticket->comments) }})</h5>
            <ul>
                @foreach($ticket->comments as $comment)
                    <li><span>{{ $comment->comment }}</span> - <i><a href="{{ url('/tickets/user', $comment->user_id) }}">{{ $comment->user->name }}</a></i></li>
                @endforeach
            </ul>
        </div>

        <hr/>

        <!-- delete ticket button -->
        <!-- currently only user with 'admin' role can delete ticket -->
        @can('delete-post', $ticket)
        {!! Form::open(['method' => 'DELETE', 'action' => ['TicketsController@destroy', $ticket->id]]) !!}
        <div class="row">
            <div class="large-12 columns">
                {!! Form::submit('Delete Ticket', ['class' => 'right button tiny']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        @endcan

    </div>
@endsection
