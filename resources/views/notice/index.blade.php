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
                <div><h3>Create Notice Board Message</h3></div>
                
                    {{ Form::open(['action' => 'NoticeController@store',  'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                    
                    <div class="form-group">
                        {{Form::label('body', 'Notice')}}
                        {{Form::textArea('body', '', ['id' => 'summary-ckeditor', 'name' => 'body', 'class' => 'form-control', 'placeholder' => 'Notice Message'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('link', 'Web Link')}}
                        {{Form::text('link', '', [ 'class' => 'form-control', 'name' => 'link', 'placeholder' => 'Type web link here'])}}
                    </div>
                        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                    {{ Form::close() }}
                </div>
                </div>
                
                
            </div>
            
        </div>
        
    </div>

</div>
@endsection

