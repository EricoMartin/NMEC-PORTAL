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
                <div class="card-header">{{ __('Edit notice') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="card-body">
                <div><h3>Edit Notice</h3></div>
                    {{ Form::open(['action' => ['NoticeController@update', $notice->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                    <div class="form-group">
                        
                        {{Form::hidden('link', '#', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('body', 'Notice')}}
                        {{Form::textArea('body', $notice->body, ['id' => 'summary-ckeditor', 'name' => 'body', 'class' => 'form-control'])}}
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

