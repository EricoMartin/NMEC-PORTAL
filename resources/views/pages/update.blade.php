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
                        
                        {{Form::text('firstname', App\Staff::find(Auth::user()->id)->firstname, ['class' => 'form-control','placeholder'=>'First Name'])}}
                        {{Form::label('firstname', 'First Name')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        {{Form::text('lastname', App\Staff::find(Auth::user()->id)->lastname, ['class' => 'form-control','placeholder'=>'Last Name'])}}
                        {{Form::label('lastname', 'Last Name')}}
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- E-mail -->
                    <div class="md-form">
                        {{Form::text('middlename', App\Staff::find(Auth::user()->id)->middlename, ['class' => 'form-control','placeholder'=>'Middle Name'])}}
                        {{Form::label('middlename', 'Middlename')}}
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- E-mail -->
                    <div class="md-form">
                        {{Form::email('email', App\Staff::find(Auth::user()->id)->email, ['class' => 'form-control','placeholder'=>'example@email.com'])}}
                        {{Form::label('email', 'E-Mail')}}
                    </div>
                </div>
                <div class="col">
                    <!-- File Number -->
                    <div class="md-form">
                        {{Form::number('file_number', App\Staff::find(Auth::user()->id)->file_number, ['class' => 'form-control', 'readonly'=>'true'])}}
                        {{Form::label('file_number', 'File Number')}}
                    </div>
                </div>
            </div>
    
            <div class="form-row">
                <div class="col">
                     <!-- Phone number -->
                    <div class="md-form">
                        {{Form::text('phone', App\Staff::find(Auth::user()->id)->phone, ['class' => 'form-control','placeholder'=>'080XXXXXXXX'])}}
                        {{Form::label('phone', 'Phone Number')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Date of Birth -->
                    <div class="md-form">
                        {{Form::date('dob', App\Staff::find(Auth::user()->id)->dob, ['class' => 'form-control datepicker' , 'readonly'=>'true'])}}
                        {{Form::label('dob', 'Date of Birth')}}
                    <i class="fas fa-calendar input-prefix"></i>
                    </div>
                    
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- state -->
                    <div class="md-form">
                        {{Form::text('state', App\Staff::find(Auth::user()->id)->state, ['class' => 'form-control' , 'readonly'=>'true'])}}
                        {{Form::label('state', 'State')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Gender -->
                    <div class="md-form">
                        {{Form::text('gender', App\Staff::find(Auth::user()->id)->gender, ['class' => 'form-control' , 'readonly'=>'true'])}}
                        {{Form::label('gender', 'Gender')}}
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- Designation -->
                    <div class="md-form">
                        {{Form::text('designation', App\Staff::find(Auth::user()->id)->designation, ['class' => 'form-control' ,'placeholder'=>'Designation'])}}
                        {{Form::label('designation', 'Designation')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Grade Level -->
                    <div class="md-form">
                        {{Form::text('grade_level', App\Staff::find(Auth::user()->id)->grade_level, ['class' => 'form-control' , 'readonly'=>'true'])}}
                        {{Form::label('grade_level', 'Grade Level')}}
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- Location -->
                    <div class="md-form">
                        {{Form::text('location', App\Staff::find(Auth::user()->id)->location, ['class' => 'form-control' , 'readonly'=>'true'])}}
                        {{Form::label('location', 'Office Location ')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Address -->
                    <div class="md-form">
                        {{Form::text('address', App\Staff::find(Auth::user()->id)->address, ['class' => 'form-control' ,'placeholder'=>'Address'])}}
                        {{Form::label('address', 'Home Address')}}
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- Qualification -->
                    <div class="md-form">
                        {{Form::text('qualification', App\Staff::find(Auth::user()->id)->qualification, ['class' => 'form-control' , 'readonly'=>'true'])}}
                        {{Form::label('qualification', 'Qualification')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Discipline -->
                    <div class="md-form">
                        {{Form::text('discipline', App\Staff::find(Auth::user()->id)->discipline, ['class' => 'form-control' ,'placeholder'=>'Discipline'])}}
                        {{Form::label('discipline', 'Discipline')}}
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- Department -->
                    <div class="md-form">
                        {{Form::text('department', App\Staff::find(Auth::user()->id)->department, ['class' => 'form-control' ,'placeholder'=>'Department'])}}
                        {{Form::label('department', 'Department')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Committees -->
                    <div class="md-form">
                        {{Form::text('unit', App\Staff::find(Auth::user()->id)->unit, ['class' => 'form-control' ,'placeholder'=>'Unit'])}}
                        {{Form::label('unit', 'Unit')}}
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