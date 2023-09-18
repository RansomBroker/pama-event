@extends('master_event')
@section('title', 'Terima kasih')
@section('sidebar', '')
@section('navbar', '')
@section('footer', '')
@section('content')
    <div class="screen vw-100 row justify-content-center bg-event-primary m-0">
        <div class="bg-white col-lg-4 col-12 col-md-5 p-0">
            <div class="position-relative">
                {{-- modal success --}}
                <div class="screen-bg w-100 d-flex justify-content-center align-items-center position-absolute z-20 p-3">
                    <div class="card rounded-3 shadow-lg my-5 bg-event-primary">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="w-100 d-inline-flex justify-content-center">
                                            <img src="{{ asset('assets/img/redeem-confirm/gift-boxes.png') }}" alt="kado">
                                        </div>
                                        <h6 class="text-center text-warning fw-bold">Terimakasih Telah Melakukan</h6>
                                        <h6 class="text-center text-warning fw-bold">Redeem Code di {{ $booth->name }}</h6>
                                        <div class="w-100 d-flex justify-content-center">
                                            <a href="{{ route('event.index') }}" class="btn btn-warning rounded-pill text-event-primary px-5 py-1 fw-bold">OK</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- bg --}}
                <div class="position-absolute">
                    <img src="{{ asset('assets/img/redeem-confirm/bgreedem.jpg') }}" alt="" class="img-fluid screen-bg">
                </div>
            </div>
        </div>
    </div>
@endsection

