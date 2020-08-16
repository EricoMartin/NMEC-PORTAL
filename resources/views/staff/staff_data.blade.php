@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">&nbsp;&nbsp;
    
        

        </div>
    </div>
<br>
@foreach($staff as $staff_data)
    <div class="row justify-content-center">
    <div class="col-md-3">
    
    <div class="card" style="margin-left: -2rem;">
        
  <!-- Card image -->
  @if(App\Staff::find($staff_data->id)->avatar) 
  <img class="card-img-top img-thumbnail" src="/storage/images/{{App\Staff::find($staff_data->id)->avatar}}" alt="Card image cap">
  @else
  <img class="card-img-top img-thumbnail" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">
  @endif


</div>
    
    </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Staff Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="card-body">
                <div><h3>Staff Details</h3></div>
                    
                        
                            
                        
                          <table class="table table-striped">
                                <thead class="black">
                                    
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Username:</th>
                                        <td>{{$staff_data->username}}</td>
                                        </tr>
                                    <tr>
                                    <th scope="row">FirstName:</th>
                                    <td>{{$staff_data->firstname}}</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">LastName:</th>
                                    <td>{{$staff_data->lastname}}</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Email: </th>
                                    <td>{{$staff_data->email}}</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Phone: </th>
                                    <td>{{$staff_data->phone}}</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">User Id: </th>
                                    <td>{{$staff_data->user_id}}</td>
                                    </tr>

                                    <th scope="row">File Number: </th>
                                    <td>{{$staff_data->file_number}}</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Date of Birth: </th>
                                    <td>{{$staff_data->dob}}</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">State: </th>
                                    <td>{{$staff_data->state}}</td>
                                    </tr>
                                    <th scope="row">Gender: </th>
                                    <td>{{$staff_data->gender}}</td>
                                    </tr>
                                    <th scope="row">Designation: </th>
                                    <td>{{$staff_data->designation}}</td>
                                    </tr>
                                    <th scope="row">Grade Level: </th>
                                    <td>{{$staff_data->grade_level}}</td>
                                    </tr>
                                    <th scope="row">Zone: </th>
                                    <td>{{$staff_data->location}}</td>
                                    </tr>
                                    <th scope="row">Address: </th>
                                    <td>{{$staff_data->address}}</td>
                                    </tr>
                                    <th scope="row">Qualification: </th>
                                    <td>{{$staff_data->qualification}}</td>
                                    </tr>
                                    <th scope="row">Discipline: </th>
                                    <td>{{$staff_data->discipline}}</td>
                                    </tr>
                                    <th scope="row">Department: </th>
                                    <td>{{$staff_data->department}}</td>
                                    </tr>
                                    <th scope="row">Committees: </th>
                                    <td>{{$staff_data->committees}}</td>
                                    </tr>

                                </tbody>
                                </table>
                            
                           
                        
                            
                       
                        @endforeach
                  
                </div>
                </div>
                
                
            </div>
            
        </div>
        
    </div>

</div>
@endsection
