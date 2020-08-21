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
                <div class="card-header">
                    <div class='row'>
                    <div class='col-8'>
                        @if(Auth::user()->roles()->pluck('name')->contains('admin'))
                        <a class="btn btn-primary" href="/notice/create">New Notice</a></div>&nbsp;
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
                    
                <div class= "row justify-content-between align-items-center"><h3>Notice Board Messages</h3><small class="badge badge-primary badge-pill">{{count($notices)}}</small></div>
                @if(count($notices) > 0)
                <h6><strong>Notices</strong></h6>    
                <ul class="list-group">
                        @foreach($notices as $notice)
                <a class="list-group-item list-group-item-action active" href="/{{$notice->id}}/notices">{!! strip_tags(substr($notice->body, 0, 100)) !!} ...<br><small>{{$notice->created_at}}</small></a>
                            
                        <br>
                        @endforeach
                    </ul>
                    
                    @else
                    <p>No Messages found</p>
                    @endif
                    
                </div>
                </div>
                {{$notices->links()}}
                
            </div>
            
        </div>
        
    </div>

</div>
@endsection
