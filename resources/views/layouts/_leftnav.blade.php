<!--left side navigation-->
<div id="ticket-hirarchy" class="large-2 medium-3 columns">
    <!-- for backlogs -->
    <ul id="actions" class="side-nav">
        <li class="title">ACTIONS</li>
        <li><a href="{{ route('create_ticket') }}">Create A New Ticket <i class="icons fi-page-add right"></i></a></li>
    </ul>

    <ul style="padding: 0;" class="side-nav"><li class="divider"></li></ul>

    <!-- for backlogs -->
    <ul id="backlogs" class="side-nav">
        <li class="title">BACKLOGS</li>
        @foreach($backlogs as $backlog)
            <li><a href="{{ route('tickets_by_backlog', $backlog->id) }}">{{ $backlog->name }}<span class="label right">{{ $backlog->tickets()->count() }}</span></a></li>
        @endforeach
    </ul>

    <ul style="padding: 0;" class="side-nav"><li class="divider"></li></ul>

    <!-- for opened, closed, etc.. -->
    <ul id="ticket-special" class="side-nav">

        <li class="title">SPECIAL FILTERS</li>
        @if(Auth::check())
            <li><a href="{{ route('tickets_by_user', Auth::user()->id) }}">My Tickets<span class="label right">{{ Auth::user()->tickets()->count() }}</span></a></li>
        @endif

        <!-- open, close tickets filter -->
        <li><a href="{{ route('tickets_by_status', 'open') }}">Open Tickets<span class="label right">{{ $open_tickets_count }}</span></a></li>
        <li><a href="{{ route('tickets_by_status', 'close') }}">Closed Tickets<span class="label right">{{ $close_tickets_count }}</span></a></li>

        <li class="divider"></li>

        <!-- bug, task tickets filter -->
        <li><a href="{{ route('tickets_by_type', 'bug') }}">Bug Tickets<span class="label right">{{ $bug_tickets_count }}</span></a></li>
        <li><a href="{{ route('tickets_by_type', 'task') }}">Task Tickets<span class="label right">{{ $task_tickets_count }}</span></a></li>

        <li class="divider"></li>

        <!-- high, low and medium priority tickets filter -->
        <li><a href="{{ route('tickets_by_priority', 'high') }}">High Priority Tickets<span class="label right">{{ $high_prio_tickets_count }}</span></a></li>
        <li><a href="{{ route('tickets_by_priority', 'low') }}">Low Priority Tickets<span class="label right">{{ $low_prio_tickets_count }}</span></a></li>
        <li><a href="{{ route('tickets_by_priority', 'medium') }}">Medium Priority Tickets<span class="label right">{{ $medium_prio_tickets_count }}</span></a></li>

    </ul>
    <ul style="padding: 0;" class="side-nav"><li class="divider"></li></ul>
</div>