@extends('app.app')

@push('css')
@endpush

@section('content')
    <div class="card card-body">
        <div class="alert alert-success justify-content-center mt-5">
            <p class="text-center">
                {{ ucwords($data['surname'] . ' ' . $data['other_name']) }} your application submitted successfully .
            </p>
        </div>
    </div>
@stop

@push('script')
@endpush
