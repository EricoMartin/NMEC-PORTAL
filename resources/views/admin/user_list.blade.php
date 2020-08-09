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
  <!-- Card content -->


</div>
    
    </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="card-body">
                <div><h3>List of Users</h3></div>
                    <ul class="list-group">
                        @foreach($users as $user)
                            
                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           {{$user->name}}
                           @foreach($user->roles as $role)
                        <span class="badge badge-primary badge-pill">{{$role->name}}</span>
                            @endforeach
                        </li>
                        @endforeach
                    </ul>
                </div>
                </div>
                
                
            </div>
            
        </div>
        
    </div>

</div>
@endsection
