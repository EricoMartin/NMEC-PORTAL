@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class= 'alert alert-danger'>
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
        <div class= 'alert alert-success'>
            {{session('success')}}
        </div>
@endif

@if(session('error'))
        <div class= 'alert alert-danger'>
            {{session('error')}}
        </div>
@endif
@if(Auth::user()->status ==='DEFAULT')
        <div class= 'alert alert-danger'>
            <h4>You have not changed your DEFAULT PASSWORD Kindly click this <a href="/password/reset">link</a> to change your password</h4>
        </div>
@endif