@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.messages')
<br>
    <div class="row justify-content-center">
    <div class="col-md-3">
    
    <div class="card" >

  <!-- Card image -->
  @if(!App\Staff::find(Auth::user()->id)->avatar)
  <img class="card-img-top img-thumbnail" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">
  
  @else
  <img class="card-img-top img-thumbnail" src="/storage/images/{{App\Staff::find(Auth::user()->id)->avatar}}" alt="Card image cap">
  @endif
  <!-- Card content -->
  <div class="card-body">

    <!-- Text -->
    {{-- @if(App\Staff::find(Auth::user()->id)->avatar === 'placeholder-person-300x300.png') --}}
    <p class="card-text">Maximum Image Size 500kb.</p>
    {{ Form::open(['action' => 'StaffController@uploadAvie', 'method' => 'POST', 'enctype' => 'multipart/form-data'], ['id' => 'display-form']) }}
    <div class="form-group">
    <!-- Button -->
    {{Form::file('avatar')}}
    <br>
    </div>  
    {{Form::submit('Upload', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}
    {{-- @endif --}}
  </div>

</div>
    
    </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h5>{{ __('Dashboard') }}</h5></div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="card-body">
                <div><h5>Staff Data</h5></div>
                <table class="table table-striped">
                    <thead class="black">
                        
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Username:</th>
                            <td>{{App\Staff::find(Auth::user()->id)->username}}</td>
                            </tr>
                        <tr>
                        <th scope="row">FirstName:</th>
                        <td>{{App\Staff::find(Auth::user()->id)->firstname}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Middle Name:</th>
                            <td>{{App\Staff::find(Auth::user()->id)->middlename}}</td>
                            </tr>
                        <tr>
                        <th scope="row">LastName:</th>
                        <td>{{App\Staff::find(Auth::user()->id)->lastname}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Email: </th>
                        <td>{{App\Staff::find(Auth::user()->id)->email}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Phone: </th>
                        <td>{{App\Staff::find(Auth::user()->id)->phone}}</td>
                        </tr>
                        <tr>
                        <th scope="row">User Id: </th>
                        <td>{{App\Staff::find(Auth::user()->id)->user_id}}</td>
                        </tr>

                        <th scope="row">File Number: </th>
                        <td>{{App\Staff::find(Auth::user()->id)->file_number}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Date of Birth: </th>
                        <td>{{App\Staff::find(Auth::user()->id)->dob}}</td>
                        </tr>
                        <tr>
                        <th scope="row">State: </th>
                        <td>{{App\Staff::find(Auth::user()->id)->state}}</td>
                        </tr>
                        <th scope="row">Gender: </th>
                        <td>{{App\Staff::find(Auth::user()->id)->gender}}</td>
                        </tr>
                        <th scope="row">Designation: </th>
                        <td>{{App\Staff::find(Auth::user()->id)->designation}}</td>
                        </tr>
                        <th scope="row">Grade Level: </th>
                        <td>{{App\Staff::find(Auth::user()->id)->grade_level}}</td>
                        </tr>
                        <th scope="row">Zone: </th>
                        <td>{{App\Staff::find(Auth::user()->id)->location}}</td>
                        </tr>
                        <th scope="row">Address: </th>
                        <td>{{App\Staff::find(Auth::user()->id)->address}}</td>
                        </tr>
                        <th scope="row">Qualification: </th>
                        <td>{{App\Staff::find(Auth::user()->id)->qualification}}</td>
                        </tr>
                        <th scope="row">Discipline: </th>
                        <td>{{App\Staff::find(Auth::user()->id)->discipline}}</td>
                        </tr>
                        <th scope="row">Department: </th>
                        <td>{{App\Staff::find(Auth::user()->id)->department}}</td>
                        </tr>
                        <th scope="row">Unit: </th>
                        <td>{{App\Staff::find(Auth::user()->id)->unit}}</td>
                        </tr>

                    </tbody>
                    </table>
                </div>
                </div>
                
                
            </div>
            
        </div>
        
    
    <div class="col-md-3">
        <div class="card" >
                        
                            @include('inc.notice')
                
</div>
@endsection
