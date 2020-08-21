@extends('layouts.msg')

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
                <div class="card-header">{{ __('Reply Message') }}</div>
                <div class="card-header">
                    <div class="row">
                    <div class='col'>
                        <a class="btn btn-primary" href="/reply/{{$messages->id}}/index">Reply</a></div>&nbsp;
                    <div class='col-7'>
                        {!!Form::open(['action' => ['MessageController@deleteMessage', $messages->id], 'method' => 'POST'])!!}
                            {!!Form::hidden('_method', 'DELETE')!!}
                            {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
                        {!!Form::close()!!}
            </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="card-body">
                <div><h3>{{$messages->subject}}</h3></div>
                <small>Message sent on {{$messages->created_at}} by {{App\Staff::find($messages->user_id)->username}}</small>
                <div>{!!$messages->message!!}</div>
                @if($messages->filename)
                <a target="_blank" href="/storage/files/{{$messages->filename}}"><strong style="text-decoration: underline"> Download Attachment</strong></a>
                @endif
            </div>
            <hr />

                @if(count($messages->replies) > 0)
                    <h4>Message Replies</h4>
                    <ul class="list-group">
                    @foreach($messages->replies as $reply)
                        <div class="card-body">
                            <li class="list-group-item">
                            <strong>From: {{App\Staff::find($reply->user_id)->username}}</strong>
                            <br>
                            <small>{{$reply->created_at}}</small>
                            <p>{!!$reply->message!!}</p>
                            @if($reply->filename)
                            <a target="_blank" href="/storage/files/{{$reply->filename}}"><strong style="text-decoration: underline"> Download File Attachment</strong></a>
                            @endif
                            </li>
                        </div>
                    @endforeach
                </ul>
                {{$messages->replies->links()}}
                @endif
        </div>
        
        
    </div>
    
</div>

@endsection