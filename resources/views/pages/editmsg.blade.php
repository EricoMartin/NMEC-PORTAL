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
            <div class="card">
                <div class="card-header">{{ __('Create Message') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="card-body">
                <div><h3>Edit Message</h3></div>
                    {{ Form::open(['action' => ['MessageController@updateMessage', $message->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                    <div class="form-group">
                        {{Form::label('file_number', 'To')}}
                        {{Form::number('file_number', App\Staff::where('user_id', $message->staff_id)->get('file_number'), ['class' => 'form-control', 'placeholder' => 'File Number'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('subject', 'Subject')}}
                        {{Form::text('subject', $message->subject, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('message', 'Message')}}
                        {{Form::textArea('message', $message->message, ['id' => 'summary-ckeditor', 'name' => 'message', 'class' => 'form-control', 'placeholder' => 'Type your message here'])}}
                    </div>
                    <div class="form-group">
                        {{Form::file('filename')}}
                    </div>
                        {{Form::hidden('_method', 'PUT')}}
                        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                    {{ Form::close() }}
                </div>
                </div>
                
                
            </div>
            
        </div>
        
    </div>

</div>
@endsection

