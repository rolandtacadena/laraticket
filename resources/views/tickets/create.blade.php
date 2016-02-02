@extends('app')

@section('content')
    <!-- left nav -->
    @include('layouts._leftnav')
    <div id="ticket-table" class="large-10 medium-9 columns">

        <!--filter navigation-->
        @include('layouts._filternav')

        <hr/>

        <!-- include errors -->
        @include('errors.list')

        <div class="ticket-form">
            {!! Form::model($ticket = new \App\Ticket, ['url' => 'tickets']) !!}
                @include('tickets.form', ['submiButtonText' => 'Create Ticket', 'formLabel' => 'Create Ticket', 'ticket_action' => 'create'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection