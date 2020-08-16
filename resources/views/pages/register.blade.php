@extends('layouts.reg')
    <style> 
        .card-header:first-child {
    margin-bottom: 20px;
}
    </style>
@section('content')

<!-- Material form register -->
<div class="container">
    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Staff Data</strong>
    </h5>

    <!--Card content-->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

        <!-- Form -->
        {!! Form::open(['action' => 'StaffController@createStaff', 'method' => 'POST']) !!}
        <div class="text-center" style="color: #757575;" >

            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        
                        {{Form::text('firstname', '', ['class' => 'form-control'])}}
                        {{Form::label('firstname', 'First Name')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        {{Form::text('middlename', '', ['class' => 'form-control'])}}
                        {{Form::label('middlename', 'Middlename')}}
                    </div>
                </div>
                <!-- Last name -->
            </div>

        <div class='form-row'> 
            <div class="col md-form">
                        {{Form::text('lastname', '', ['class' => 'form-control'])}}
                        {{Form::label('lastname', 'Last Name')}}
            
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
                        {{Form::number('file_number', Auth::user()->file_id, ['class' => 'form-control', 'readonly' => 'true'])}}
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
                        {{Form::text('state', '', ['class' => 'form-control' ])}}
                        {{Form::label('state', 'State')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Gender -->
                    <div class="md-form">
                        {{Form::select('gender', ['male', 'female'], '',['class' => 'form-control' ])}}
                        {{Form::label('gender', 'Gender')}}
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- Designation -->
                    <div class="md-form">
                        {{Form::text('designation', '', ['class' => 'form-control' ])}}
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
                        {{Form::text('location', '', ['class' => 'form-control' ])}}
                        {{Form::label('location', 'Office Location')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Address -->
                    <div class="md-form">
                        {{Form::text('address', '', ['class' => 'form-control' ])}}
                        {{Form::label('address', 'Home Address')}}
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- Qualification -->
                    <div class="md-form">
                        {{Form::text('qualification', '', ['class' => 'form-control'])}}
                        {{Form::label('qualification', 'Qualification')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Discipline -->
                    <div class="md-form">
                        {{Form::text('discipline', '', ['class' => 'form-control'])}}
                        {{Form::label('discipline', 'Discipline')}}
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- Department -->
                    <div class="md-form">
                        {{Form::text('department', '', ['class' => 'form-control' ])}}
                        {{Form::label('department', 'Department')}}
                    </div>
                </div>
                <div class="col">
                    <!-- Unit -->
                    <div class="md-form">
                        {{Form::text('unit', '', ['class' => 'form-control'])}}
                        {{Form::label('unit', 'Unit')}}
                    </div>
                </div>
            </div>

            <!-- Sign up button -->
            {{Form::submit('Submit Data', ['class' => 'btn btn-primary btn-rounded '])}}
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