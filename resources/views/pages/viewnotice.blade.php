@extends('layouts.app')

@section('content')
<div class="container">
<br>
@include('inc.messages')
    <div class="row justify-content-center">
    <div class="col-md-3">
    

</div>
    
    </div>
        <div class="col-md-10">
            <div class="card ">
                <div class="card-header">{{ __('Notice Board') }}</div>
                <div class="card-header">
                    <div class="row">
                    <a class="btn btn-primary" href='/notice/{{$notices->id}}'>Back</a>
                    @if(App\User::find(Auth::user()->id)->hasRole('admin'))
                    <div class='col'>
                        
                        <a class="btn btn-primary" href="/notice/{{$notices->id}}/edit">Edit</a></div>&nbsp;
                    <div class='col-2' id="delbutton">
                        {!!Form::open(['action' => ['NoticeController@destroy', $notices->id], 'method' => 'POST'])!!}
                            {!!Form::hidden('_method', 'DELETE')!!}
                            {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
                        {!!Form::close()!!}
            </div>
            @endif
                    </div>
                </div> 
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="card-body">
                <div><h3>Notice</h3></div>
                <small>Notice sent on {{$notices->created_at}}</small>
                <div>{!!$notices->body!!}</div>
            </div>
            <hr />

        </div>
        
        
    </div>
    
</div>

@endsection