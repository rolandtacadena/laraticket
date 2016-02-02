@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="errors">
        <strong>Whoops! Something went wrong!</strong>

        <br><br>

        <ul class="no-bullet">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
