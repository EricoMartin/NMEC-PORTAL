@extends('layouts.app')

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
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="card-body">
                    
                <div class= "row justify-content-between align-items-center"><h3>Messages</h3><small class="badge badge-primary badge-pill">{{count($messages)}}</small></div>
                @if(count($messages) > 0)    
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
                
                
            </div>
            
        </div>
        
    </div>

</div>
@endsection
