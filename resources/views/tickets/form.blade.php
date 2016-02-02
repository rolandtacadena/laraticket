<fieldset>
    <legend><i class="icons {{ $ticket_action == 'create' ? 'fi-page-add' : 'fi-page-edit'}}"></i> {{ $formLabel }}</legend>
    <div class="row">
        <div class="large-12 columns">
            {!! Form::label('title', 'Ticket Title:') !!}
            {!! Form::text('title', null, ['placeholder' => 'ticket name']) !!}
        </div>
    </div>
    <div class="row">
        <div class="large-6 columns">
            {!! Form::label('description', 'Ticket Description:') !!}
            {!! Form::textarea('description', null, ['placeholder' => 'ticket description', 'rows' => 2]) !!}
        </div>
        <div class="large-6 columns">
            {!! Form::label('type', 'Ticket Types:') !!}
            {!! Form::select('type', $t = array_combine($ticket_types, $ticket_types), null) !!}
        </div>
    </div>
    <div class="row">
        <div class="large-3 columns">
            {!! Form::label('priority', 'Ticket Priorities:') !!}
            {!! Form::select('priority', array_combine($ticket_priorities, $ticket_priorities), null) !!}
        </div>
        <div class="large-3 columns">
            {!! Form::label('user_id', 'Dev Assigned:') !!}
            {!! Form::select('user_id', $users->lists('name', 'id')) !!}
        </div>
        <div class="large-3 columns">
            {!! Form::label('dev_loe', 'Dev Loe:') !!}
            {!! Form::text('dev_loe', null, ['placeholder' => 'dev loe']) !!}
        </div>
        <div class="large-3 columns">
            {!! Form::label('backlog_id', 'Backlog:') !!}
            {!! Form::select('backlog_id', $backlogs->lists('name', 'id')) !!}
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="large-12 columns">
            {!! Form::submit($submiButtonText, ['class' => 'right button tiny']) !!}
        </div>
    </div>
</fieldset>