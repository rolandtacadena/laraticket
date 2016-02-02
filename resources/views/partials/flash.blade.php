@if(Session::has('flash_message'))
    <div data-alert class="alert-box {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
        {{ session('flash_message') }}
        @if(Session::has('flash_message_important'))
            <a href="#" class="close">&times;</a>
        @endif
    </div>
@endif