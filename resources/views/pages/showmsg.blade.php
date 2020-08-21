@extends('layouts.msg')

@section('content')
<div class="container">
<br>
    <div class="row justify-content-center">
    <div class="col-md-3">
    
    <div class="card" style="margin-left: -2rem;">

  <!-- Card image -->
  @if(App\Staff::find(Auth::user()->id)->avatar) 
  <img class="card-img-top img-thumbnail" src="/storage/images/{{App\Staff::find(Auth::user()->id)->avatar}}" alt="Card image cap">
  @else
  <img class="card-img-top img-thumbnail" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">
  @endif  
</div>
    
    </div>
            <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {!! Form::open(['action' => 'MessageController@search', 'method' => 'GET']) !!}
                    <div class="form-row input-group">
                    
                    <div class="col" style="color: #757575;" >

                        <div class="md-form">
                                    
                                    {{Form::search('search', '', ['class' => 'form-control', 'name' => 'search'])}}
                                </div>
                            </div>
                                    <div class=" col">
                                        <span class="md-form input-group-prepend">
                                        {{Form::submit('Search', ['class' => 'btn btn-primary form-group-btn'])}}
                                        </span>
                                    </div>      
                    </div>
                    {!! Form::close() !!}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class= "row justify-content-between align-items-center"><h3>Messages</h3><small class="badge badge-primary badge-pill">{{count($messages)}}</small></div>
                @if(count($messages) > 0)
                <h6><strong>Received Messages</strong></h6>    
                <ul class="list-group">
                        @foreach($messages as $message)
                <a class="list-group-item list-group-item-action active" href="/{{$message->id}}/message">{{$message->subject}}<br> <small>{{strip_tags(substr($message->message, 0, 100))}}</small><br><small>{{$message->created_at}}</small></a>
                            
                        <br>
                        @endforeach
                    </ul>
                    
                    @else
                    <p>No Messages found</p>
                    @endif
                    
                </div>
                </div>
                {{$messages->links()}}
                
            </div>
            
        </div>
        
    </div>

</div>
@endsection
