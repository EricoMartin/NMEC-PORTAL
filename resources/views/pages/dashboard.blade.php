@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-auto">&nbsp;&nbsp;
<button type="button" class="btn btn-primary">Create Message</button>&nbsp;
<button type="button" class="btn btn-primary">Send E-Mail</button>&nbsp;

<a class="btn btn-primary" href="<?php echo e(url('/staff/'.Auth::user()->id.'/update')); ?>" >Update Data</a>&nbsp;
<button type="button" class="btn btn-primary">Tasks</button>&nbsp;&nbsp;
</div>
</div>
<br>
    <div class="row justify-content-center">
    <div class="col-md-3">
    
    <div class="card" style="margin-left: -2rem;">

  <!-- Card image -->
  <img class="card-img-top img-thumbnail" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">
  
  <!-- Card content -->
  <div class="card-body">

    <!-- Text -->
    <p class="card-text">Maximum Image Size 500kb.</p>
    <!-- Button -->
    <a href="#" class="btn btn-primary">Upload Image</a>

  </div>

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
                <div><h3>Messages</h3></div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Cras justo odio
                            <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Dapibus ac facilisis in
                            <span class="badge badge-primary badge-pill">5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Morbi leo risus
                            <span class="badge badge-primary badge-pill">9</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Cras justo odio
                            <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Dapibus ac facilisis in
                            <span class="badge badge-primary badge-pill">8</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Morbi leo risus
                            <span class="badge badge-primary badge-pill">6</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Cras justo odio
                            <span class="badge badge-primary badge-pill">4</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Dapibus ac facilisis in
                            <span class="badge badge-primary badge-pill">20</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Morbi leo risus
                            <span class="badge badge-primary badge-pill">1</span>
                        </li>
                    </ul>
                </div>
                </div>
                
                
            </div>
            
        </div>
        
    </div>
    <div class="col-md-8">
    <div class="card" style="width: 18rem; margin-top: -16rem;">
                    
                        <div class="card-header">
                            <h3>{{App\Staff::find(Auth::user()->id)->lastname}} {{App\Staff::find(Auth::user()->id)->firstname}}</h3>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"> Dept: {{App\Staff::find(Auth::user()->id)->department}} </li>
                                    <li class="list-group-item"> Zone: {{App\Staff::find(Auth::user()->id)->location}}</li>
                                    <li class="list-group-item"> Gender: {{App\Staff::find(Auth::user()->id)->gender}}</li>
                                    <li class="list-group-item"> Level: {{App\Staff::find(Auth::user()->id)->grade_level}}</li>
                                </ul>
                    </div>
                </div>
</div>
@endsection
