@extends('app.app')

@push('css')
@endpush

@section('content')
    <div class="card card-body">
        {!! Form::open(['route' => 'student.submit.application', 'method' => 'post', 'id' => 'SubmitApplicationForm']) !!}
        {!! Form::hidden('_key', request()->get('_key')) !!}
        <div class="form-group">
            {!! Form::label('surname', 'Surname', ['class' => 'control-label']) !!}
            {!! Form::text('surname', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('other_name', 'Other Name', ['class' => 'control-label']) !!}
            {!! Form::text('other_name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('date_of_birth', 'Date Of Birth', ['class' => 'control-label']) !!}
            {!! Form::date('date_of_birth', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('gender', 'Gender', ['class' => 'control-label']) !!}
            {!! Form::select('gender', getGender() , null , ['class' => 'form-control', 'placeholder' => 'Select ...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('marital_status', 'Marital Status', ['class' => 'control-label']) !!}
            {!! Form::select('marital_status', getMaritalStatus() , null , ['class' => 'form-control', 'placeholder' => 'Select ...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('mother_names', 'Mother Names', ['class' => 'control-label']) !!}
            {!! Form::text('mother_names', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('father_names', 'Father Names', ['class' => 'control-label']) !!}
            {!! Form::text('father_names', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('guardian_names', 'Guardian Names', ['class' => 'control-label']) !!}
            {!! Form::text('guardian_names', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nationality', 'Nationality', ['class' => 'control-label']) !!}
            {!! Form::text('nationality', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('country_residence', 'Country Residence', ['class' => 'control-label']) !!}
            {!! Form::text('country_residence', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('national_id', 'National ID', ['class' => 'control-label']) !!}
            {!! Form::text('national_id', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('telephone', 'Telephone Number', ['class' => 'control-label']) !!}
            {!! Form::email('telephone', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('passport_number', 'Passport Number', ['class' => 'control-label']) !!}
            {!! Form::text('passport_number', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('index_number_s_6', 'Index Number of s6', ['class' => 'control-label']) !!}
            {!! Form::text('index_number_s_6', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('previous_education', 'Previous Education', ['class' => 'control-label']) !!}
            {!! Form::text('previous_education', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('qualification_obtained', 'Qualification Obtained', ['class' => 'control-label']) !!}
            {!! Form::text('qualification_obtained', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('qualification_obtained', 'Qualification Obtained', ['class' => 'control-label']) !!}
            {!! Form::text('qualification_obtained', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('year_of_completion', 'Year Of Completion', ['class' => 'control-label']) !!}
            {!! Form::selectRange('year_of_completion', 2000, date('Y', strtotime('-1 year')), null, ['class' => 'form-control', 'placeholder' => 'Select year']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('physics_disability', 'Physics Disability', ['class' => 'control-label']) !!}
            {!! Form::text('physics_disability', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('next_kin_phone_number', 'Next Kin Phone Number', ['class' => 'control-label']) !!}
            {!! Form::text('next_kin_phone_number', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('college_id', 'Choose College', ['class' => 'control-label']) !!}
            {!! Form::select('college_id', $colleges , null , ['class' => 'form-control', 'placeholder' => 'Select ...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('department_id', 'Choose Department', ['class' => 'control-label']) !!}
            {!! Form::select('department_id', [] , null , ['class' => 'form-control', 'placeholder' => 'Select ...']) !!}
        </div>
        <div class="form-group mt-2">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop

@push('script')
    <!-- Scripts -->
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\RegisterFormRequest', '#SubmitApplicationForm'); !!}
    <script>
        $(function () {
            $("#college_id").on('change', function () {
                let v = $(this).val();
                $.getJSON(
                    '{{ route('ajax.get.department') . "?_key=" . request('_key') }}&_college=' + v,
                    function (data) {
                        let select = "<option value=''>Select here ...</option>";
                        $.each(data, function (key, val) {
                            select += "<option value='" + key + "'>" + val + "</option>";
                        });
                        $("#department_id").html(select);
                    }
                );
            });
        });
    </script>
@endpush
