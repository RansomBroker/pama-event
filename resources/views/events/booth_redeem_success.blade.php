@extends('master')
@section('title', 'Terima kasih')
@section('sidebar', '')
@section('navbar', '')
@section('footer', '')
@section('content')
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-xl-4 col-lg-4 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="w-100 d-inline-flex justify-content-center">
                                    <img src="{{ asset('assets/img/gift-boxes.png') }}" alt="kado">
                                </div>
                                <h5 class="text-center">Terima kasih telah melakukan</h5>
                                <h5 class="text-center">redeem Code di {{ $booth->name }}</p>
                                <div class="w-100 d-flex justify-content-center">
                                    <a href="{{ route('event.index') }}" class="btn btn-success">Ok</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

