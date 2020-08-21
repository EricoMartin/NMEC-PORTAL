@extends('layouts.app')

@section('content')
<div class="container">
<br>
@include('inc.messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p><b>{{ $messages->subject }}</b></p>
                    <p>
                        {!!$messages->message!!}
                    </p>
                    <hr />
                    <h4>Add Reply</h4>
                    <form method="post" action="{{ route('reply.add', $messages->id) }}"  enctype= "multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Message</label>
                            <textarea  name="message" id="summary-ckeditor" class="form-control" placeholder="Type your reply here"></textarea>
                            <input type="file" name="filename" id="filename" />
                            <input type="hidden" name="msg_id" value="{{ $messages->id }}" />
                            <input type="hidden" name="staff_id" value="{{ $messages->staff_id }}" />
                            <input type="hidden" name="subject" value="{{ $messages->subject }}" />
                            
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Add Reply" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection