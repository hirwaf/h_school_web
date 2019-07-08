@extends('app.app')

@push('css')
@endpush

@section('content')
    <div class="card card-body">
        <div class="form-group">
            {!! Form::label('surname', 'Surname', ['class' => 'control-label']) !!}
            {!! Form::text('surname', $student->surname, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('other_name', 'Other Name', ['class' => 'control-label']) !!}
            {!! Form::text('other_name', $student->other_name, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('date_of_birth', 'Date Of Birth', ['class' => 'control-label']) !!}
            {!! Form::date('date_of_birth', $student->date_of_birth, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('gender', 'Gender', ['class' => 'control-label']) !!}
            {!! Form::select('gender', getGender() , $student->gender, ['class' => 'form-control', 'disabled' => true, 'placeholder' => 'Select ...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('marital_status', 'Marital Status', ['class' => 'control-label']) !!}
            {!! Form::select('marital_status', getMaritalStatus() , $student->marital_status, ['class' => 'form-control', 'disabled' => true, 'placeholder' => 'Select ...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('mother_names', 'Mother Names', ['class' => 'control-label']) !!}
            {!! Form::text('mother_names', $student->mother_names, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('father_names', 'Father Names', ['class' => 'control-label']) !!}
            {!! Form::text('father_names', $student->father_names, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('guardian_names', 'Guardian Names', ['class' => 'control-label']) !!}
            {!! Form::text('guardian_names', $student->guardian_names, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nationality', 'Nationality', ['class' => 'control-label']) !!}
            {!! Form::text('nationality', $student->nationality, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('country_residence', 'Country Residence', ['class' => 'control-label']) !!}
            {!! Form::text('country_residence', $student->country_residence, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('national_id', 'National ID', ['class' => 'control-label']) !!}
            {!! Form::text('national_id', $student->national_id, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
            {!! Form::email('email', $student->email, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('telephone', 'Telephone Number', ['class' => 'control-label']) !!}
            {!! Form::email('telephone', $student->telephone, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('passport_number', 'Passport Number', ['class' => 'control-label']) !!}
            {!! Form::text('passport_number', $student->passport_number, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('index_number_s_6', 'Index Number of s6', ['class' => 'control-label']) !!}
            {!! Form::text('index_number_s_6', $student->index_number_s_6, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('previous_education', 'Previous Education', ['class' => 'control-label']) !!}
            {!! Form::text('previous_education', $student->previous_education, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('qualification_obtained', 'Qualification Obtained', ['class' => 'control-label']) !!}
            {!! Form::text('qualification_obtained', $student->qualification_obtained, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('qualification_obtained', 'Qualification Obtained', ['class' => 'control-label']) !!}
            {!! Form::text('qualification_obtained', $student->qualification_obtained, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('year_of_completion', 'Year Of Completion', ['class' => 'control-label']) !!}
            {!! Form::selectRange('year_of_completion', 2000, date('Y', strtotime('-1 year')), $student->year_of_completion, ['class' => 'form-control', 'disabled' => true, 'placeholder' => 'Select year']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('physics_disability', 'Physics Disability', ['class' => 'control-label']) !!}
            {!! Form::text('physics_disability', $student->physics_disability, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('next_kin_phone_number', 'Next Kin Phone Number', ['class' => 'control-label']) !!}
            {!! Form::text('next_kin_phone_number', $student->next_kin_phone_number, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
    </div>
@stop

@push('script')
@endpush
