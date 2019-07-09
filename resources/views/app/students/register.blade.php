@extends('app.app')

@push('css')
@endpush

@section('content')
    <div class="card card-body">
        {!! Form::open(['url' => '', 'method' => 'post']) !!}
        <div class="form-group">
            {!! Form::label('std_id', 'Student ID', ['class' => 'control-label']) !!}
            {!! Form::text('std_id', $student->std_id, ['class' => 'form-control', 'readonly' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', 'Student Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', $student->name, ['class' => 'form-control', 'disabled' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('academic_year', 'Academic Year', ['class' => 'control-label']) !!}
            {!! Form::text('academic_year', setting('site.academic_year'), ['class' => 'form-control', 'readonly' => true]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('year_of_study', 'Year Of Study', ['class' => 'control-label']) !!}
            {!! Form::text('year_of_study', (int) $student->year_of_study + 1, ['class' => 'form-control', 'readonly' => true]) !!}
        </div>
        <div class="form-group">
            @php
                $semester = null;
            @endphp
            @forelse($courses as $course)
                @if ($semester == $course->semester)
                @else
                    {!! Form::label('semester', 'Semester'. $semester, ['class' => 'control-label']) !!}
                @endif
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" checked readonly value="{{ $course->id }}"> {{ $course->name }}
                    </label>
                </div>
                @php
                    $semester = $course->semester;
                @endphp
            @empty
            @endforelse
        </div>

        <div class="form-group mt-2">
            {!! Form::submit('Register', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop

@push('script')
@endpush
