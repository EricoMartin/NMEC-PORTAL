@extends('layouts.reg')
    <style> 
        .card-header:first-child {
    margin-bottom: 20px;
}
    </style>
@section('content')

<!-- Material form register -->
<div class="container">
    @include('inc.messages')
    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Staff Data</strong>
    </h5>

    <!--Card content-->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

        <!-- Form -->
        {!! Form::open(['action' => 'StaffController@createStaff', 'method' => 'POST', 'class' => 'needs-validation', 'novalidate']) !!}
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
                    <!-- Middle name -->
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
                    <div class="invalid-feedback">
                        Please provide a valid state.
                      </div>
                </div>
                <div class="col">
                    <!-- Gender -->
                    <div class="md-form">
                        {{Form::select('gender', ['male', 'female'], '',['class' => 'form-control custom-select' ])}}
                        {{Form::label('gender', 'Gender')}}
                    </div>
                </div>
                <div class="invalid-feedback">
                    Please select a valid gender.
                  </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- Designation -->
                    <div class="md-form">
                        {{Form::text('designation', '', ['class' => 'form-control' ])}}
                        {{Form::label('designation', 'Designation')}}
                    </div>
                    <div class="invalid-feedback">
                        Please provide a valid designation.
                      </div>
                </div>
                <div class="col">
                    <!-- Grade Level -->
                    <div class="md-form">
                        <div class="form-control" name='grade_level'>
                        {{Form::label('conraiss', 'Conraiss')}}
                        {{Form::select('grade_level', array(
                            'Conraiss' => array(1,2,3,4,5,6,7,8,9,10,11,12,13,14),
                         ), '', ['class' => '' ,])}}
                         {{Form::label('step', 'Step')}}
                         {{Form::select('step', array(
                            'Step' => array(1,2,3,4,5,6,7,8,9,10),
                         ), '', ['class' => '' ,])}}
                        </div>
                        {{Form::label('grade_level', 'Grade_level')}}
                    </div>
                </div>
                <div class="invalid-feedback">
                    Please provide a valid grade_level.
                  </div>
            </div>

            <div class="form-row">
                <div class="col">
                     <!-- Location -->
                    <div class="md-form">
                        {{Form::select('location', ['NMEC HeadQuaters Abuja' => 'NMEC HQtrs Abuja', 'North-Central Zone, Minna' => 'North-Central Zone, Minna', 'NMEC Resource Centre, Minna' => 'NMEC Resource Centre, Minna', 'North-East Zone, Bauchi' => 'North-East Zone, Bauchi',
                    'North-West Zone, Katsina' => 'North-West Zone, Katsina', 'NMEC Documentation Centre' => 'Kano Documentation Centre, Kano', 'South-East Zone, Owerri' => 'South-East Zone, Owerri', 'South-West Zone, Ibadan' => 'South-West Zone, Ibadan'],'', ['class' => 'form-control' ])}}
                        {{Form::label('location', 'Office Location')}}
                    </div>
                    <div class="invalid-feedback">
                        Please select a valid zone.
                      </div>
                </div>
                <div class="col">
                    <!-- Address -->
                    <div class="md-form">
                        {{Form::text('address', '', ['class' => 'form-control' ])}}
                        {{Form::label('address', 'Home Address')}}
                    </div>
                    <div class="invalid-feedback">
                        Please provide a valid address.
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
                    <div class="invalid-feedback">
                        Please provide a valid qualification.
                      </div>
                </div>
                <div class="col">
                    <!-- Discipline -->
                    <div class="md-form">
                        {{Form::text('discipline', '', ['class' => 'form-control'])}}
                        {{Form::label('discipline', 'Discipline')}}
                    </div>
                    <div class="invalid-feedback">
                        Please provide a valid discipline. Eg. Bsc, Msc etc.
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
                    <div class="invalid-feedback">
                        Please select a valid department.
                      </div>
                </div>
                <div class="col">
                    <!-- Unit -->
                    <div class="md-form">
                        {{Form::text('unit', '', ['class' => 'form-control'])}}
                        {{Form::label('unit', 'Unit')}}
                    </div>
                    <div class="invalid-feedback">
                        Please select a valid unit.
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
    
// JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
