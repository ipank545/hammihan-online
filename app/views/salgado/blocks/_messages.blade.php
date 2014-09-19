@if($errors->has() || Session::has('error_message'))
    <ul class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        @if(Session::has('error_message'))
            <li style="font-size:12px;">{{Session::get('error_message')}}</li>
        @endif
        @foreach($errors->all() as $error)
            <li style="font-size:12px;">{{$error}}</li>
        @endforeach
    </ul>
@endif
@if (Session::has('success_message'))
    <ul class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <li style="font-size:12px;">{{ Session::get('success_message') }}</li>
    </ul>
@endif
