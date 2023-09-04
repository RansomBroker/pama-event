@extends('master_event')
@section('title', 'Terima kasih')
@section('sidebar', '')
@section('navbar', '')
@section('footer', '')
@section('content')
    <div class="vh-100 vw-100 row justify-content-center bg-event-primary m-0">
        <div class="bg-white col-lg-4 col-12 col-md-5">
            <div class="vh-100 d-flex justify-content-center align-items-center">
                <div class="card rounded-3 shadow-lg my-5 bg-event-primary">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="w-100 d-inline-flex justify-content-center">
                                        <img src="{{ asset('assets/img/gift-boxes.png') }}" alt="kado">
                                    </div>
                                    <h5 class="text-center text-warning fw-bold">Terima kasih telah melakukan</h5>
                                    <h5 class="text-center text-warning fw-bold">redeem Code di {{ $booth->name }}</h5>
                                    <div class="w-100 d-flex justify-content-center">
                                        <a href="{{ route('event.index') }}" class="btn btn-warning rounded-pill text-event-primary px-5 py-1">Ok</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

