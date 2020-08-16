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
                <div class="card-header">{{ __('Unit Head Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                <div class="card-body">
                <div><h3>List of {{$staff[0]->unit}} Unit Staff</h3></div>
                    <ul class="list-group">
                        
                        @foreach($staff as $staff_list)
                        <table class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>{{$staff_list->firstname}} {{$staff_list->lastname}}</td>
                                <td><a class="btn btn-primary" href="<?php echo e(url('/unithead/'.$staff_list->user_id.'/message')); ?>" >Message {{$staff_list->lastname}}</a>
                                </td>
                                <td><a class="btn btn-primary" href="<?php echo e(url('/unithead/'.$staff_list->user_id.'/staff')); ?>" >view Data</a></td>
                              </tr>
                            </tbody>
                          </table>
                        @endforeach
                    </ul>
                    <br>
                    {{$staff->links()}}
                </div>
                </div>
                
                
            </div>
            
        </div>
        
    </div>

</div>
@endsection
