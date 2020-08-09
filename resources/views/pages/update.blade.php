@extends('layouts.app')
    <style> 
        .card-header:first-child {
    margin-bottom: 20px;
}
    </style>
@section('content')

<!-- Material form register -->
<div class="container">
@include('inc.messages')

    <div class="row card-header info-color white-text text-center py-4 ">
        <div class="col-sm"></div>
        <h4><strong class="col-sm">Staff Data Update Form</strong></h4>
        <div class="col-sm">
        <a class="btn btn-primary" href="{{ url('/home') }}">Back</a>
    </div>
    </div>

    <!--Card content-->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

        <!-- Form -->
        
        {!! Form::open(array('route' => array('update_staff_data', Auth::user()->id), 'method' => 'PUT')) !!}
        <div class="text-center" style="color: #757575;" >

            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        
                        {{Form::text('firstname', '', ['class' => 'form-control','placeholder'=>'First Name'])}}
                        {{Form::label('firstname', 'First Name')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        {{Form::text('lastname', '', ['class' => 'form-control','placeholder'=>'Last Name'])}}
                        {{Form::label('lastname', 'Last Name')}}
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- E-mail -->
                    <div class="md-form">
                        {{Form::email('email', '', ['class' => 'form-control','placeholder'=>'example@email.com'])}}
                        {{Form::label('email', 'E-Mail')}}
                    </div>
                </div>
                <div class="col">
                    <!-- File Number -->
                    <div class="md-form">
                        {{Form::number('file_number', '', ['class' => 'form-control','placeholder'=>'0123'])}}
                        {{Form::label('file_number', 'File Number')}}
                    </div>
                </div>
            </div>
    
            <div class="form-row">
                <div class="col">
                     <!-- Phone number -->
                    <div class="md-form">
                        {{Form::text('phone', '', ['class' => 'form-control','placeholder'=>'080XXXXXXXX'])}}
                        {{Form::label('phone', 'Phone Number')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Date of Birth -->
                    <div class="md-form">
                        {{Form::date('dob', '', ['class' => 'form-control datepicker' ,'placeholder'=>'Selected date'])}}
                        {{Form::label('dob', 'Date of Birth')}}
                    <i class="fas fa-calendar input-prefix"></i>
                    </div>
                    
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- state -->
                    <div class="md-form">
                        {{Form::text('state', '', ['class' => 'form-control' ,'placeholder'=>'State of Origin'])}}
                        {{Form::label('state', 'State')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Gender -->
                    <div class="md-form">
                        {{Form::text('gender', '', ['class' => 'form-control' ,'placeholder'=>'Male/ Female'])}}
                        {{Form::label('gender', 'Gender')}}
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- Designation -->
                    <div class="md-form">
                        {{Form::text('designation', '', ['class' => 'form-control' ,'placeholder'=>'Designation'])}}
                        {{Form::label('designation', 'Designation')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Grade Level -->
                    <div class="md-form">
                        {{Form::text('grade_level', '', ['class' => 'form-control' ,'placeholder'=>'Conraiss 6 step 7'])}}
                        {{Form::label('grade_level', 'Grade Level')}}
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- Location -->
                    <div class="md-form">
                        {{Form::text('location', '', ['class' => 'form-control' ,'placeholder'=>'Location'])}}
                        {{Form::label('location', 'Location (Zone)')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Address -->
                    <div class="md-form">
                        {{Form::text('address', '', ['class' => 'form-control' ,'placeholder'=>'Address'])}}
                        {{Form::label('address', 'Address')}}
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- Qualification -->
                    <div class="md-form">
                        {{Form::text('qualification', '', ['class' => 'form-control' ,'placeholder'=>'Qualification'])}}
                        {{Form::label('qualification', 'Qualification')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Discipline -->
                    <div class="md-form">
                        {{Form::text('discipline', '', ['class' => 'form-control' ,'placeholder'=>'Discipline'])}}
                        {{Form::label('discipline', 'Discipline')}}
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- Department -->
                    <div class="md-form">
                        {{Form::text('department', '', ['class' => 'form-control' ,'placeholder'=>'Department'])}}
                        {{Form::label('department', 'Department')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Committees -->
                    <div class="md-form">
                        {{Form::text('committees', '', ['class' => 'form-control' ,'placeholder'=>'Committees'])}}
                        {{Form::label('committees', 'Committees')}}
                    </div>
                </div>
            </div>

            <!-- Sign up button -->
            {{Form::submit('Submit Data', ['class' => 'btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0'])}}
            <hr>

            <!-- Terms of service -->
            <p>By clicking
                <em>Submit Data</em> you agree that you have submitted verifiable data
                

        </div>
        {!! Form::close() !!}
        <!-- Form -->
    </div>
    </div>
    </div>

</div>
<!-- Material form register -->
@endsection

<script>
    $('.datepicker').pickadate();
</script>