@extends('app.app')

@push('css')
@endpush

@section('content')
    <div class="card">
        <div class="card-header text-center">Attendance Report</div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                <th>Course</th>
                <th>Date</th>
                <th>Academic Year</th>
                </thead>
                <tbody>
                @forelse($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->course ? $attendance->course->name : "course" }}</td>
                        <td>{{ $attendance->tap_time }}</td>
                        <td>{{ $attendance->academic_year }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Not Attendance ...</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@push('script')
@endpush
