@extends('app.app')

@push('css')
    <style type="text/css">

        nav > .nav.nav-tabs {

            border: none;
            color: #fff;
            background: #272e38;
            border-radius: 0;

        }

        nav > div a.nav-item.nav-link,
        nav > div a.nav-item.nav-link.active {
            border: none;
            padding: 18px 25px;
            color: #fff;
            background: #272e38;
            border-radius: 0;
        }

        nav > div a.nav-item.nav-link.active:after {
            content: "";
            position: relative;
            bottom: -60px;
            left: -10%;
            border: 15px solid transparent;
            border-top-color: #e74c3c;
        }

        .tab-content {
            background: #fdfdfd;
            line-height: 25px;
            border: 1px solid #ddd;
            border-top: 5px solid #e74c3c;
            border-bottom: 5px solid #e74c3c;
            padding: 30px 25px;
        }

        nav > div a.nav-item.nav-link:hover,
        nav > div a.nav-item.nav-link:focus {
            border: none;
            background: #e74c3c;
            color: #fff;
            border-radius: 0;
            transition: background 0.20s linear;
        }
    </style>
@endpush

@section('content')
    <div class="card card-body">
        <div class="row" style="width: 100%">
            <div class="col-xs-12 col-md-12" style="width: 100%">
                <nav style="width: 100%">
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link" id="nav-personal-tab" data-toggle="tab" href="#nav-personal"
                           role="tab" aria-controls="nav-personal" aria-selected="true">Personal</a>
                        <a class="nav-item nav-link active" id="nav-general-tab" data-toggle="tab" href="#nav-general"
                           role="tab" aria-controls="nav-general" aria-selected="false">General</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent" style="width: 100%">
                    <div class="tab-pane fade" id="nav-personal" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="accordion" id="accordionExample">
                            @php
                                $cP = 1;
                            @endphp
                            @forelse($personal as $g_notif)
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapse{{$cP}}" aria-expanded="true"
                                                    aria-controls="collapse{{$cP}}">
                                                {{ $g_notif->lecturer ? $g_notif->lecturer->names : "UR" }}
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapse{{$cP}}" class="collapse show" aria-labelledby="heading{{$cP}}"
                                         data-parent="#accordionExample1">
                                        <div class="card-body">
                                            {!! $g_notif->message !!}
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $cP += 1;
                                @endphp
                            @empty
                                <p class="alert alert-warning">There is no notifications</p>
                            @endforelse
                        </div>
                    </div>
                    {{--  --}}
                    <div class="tab-pane fade show active" id="nav-general" role="tabpanel"
                         aria-labelledby="nav-profile-tab">
                        <div class="accordion" id="accordionExample1">
                            @php
                                $cG = 1;
                            @endphp
                            @forelse($general as $g_notif)
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapse{{$cG}}" aria-expanded="true"
                                                    aria-controls="collapse{{$cG}}">
                                                {{ $g_notif->lecturer ? $g_notif->lecturer->names : "UR" }}
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapse{{$cG}}" class="collapse show" aria-labelledby="heading{{$cG}}"
                                         data-parent="#accordionExample1">
                                        <div class="card-body">
                                            {!! $g_notif->message !!}
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $cG += 1;
                                @endphp
                            @empty
                                <p class="alert alert-warning">There is no notifications</p>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

@push('script')
@endpush
