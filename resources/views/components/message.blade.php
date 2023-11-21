 @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif



 @if ($message = Session::get('clock_messege'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    
 @if ($message = Session::get('clock_messege-success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif