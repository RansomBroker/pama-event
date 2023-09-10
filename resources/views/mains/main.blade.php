@extends('master_event')
@section('title', 'Pama Event')
@section('content')
    <div class="vh-100 vw-100 row justify-content-center bg-event-primary m-0">
        <div class="bg-white col-lg-4 col-12 col-md-5 row">
            {{-- logo & text --}}
            <div class="col-12 d-flex mt-5-rem flex-column align-items-center">
                <img src="https://placehold.co/128x128" alt="logo" width="128" class="mb-3">
                <div class="bg-event-primary px-3 py-1">
                    <span class="text-warning fw-bold">Augmented Journey</span>
                </div>
            </div>
            {{-- button --}}
            <div class="col-12 d-flex flex-column justify-content-end align-items-center mb-5">
                <a href="{{ route('event.play') }}" class="btn bg-event-primary text-white fw-bold px-5 rounded-pill mb-2"><i class='bx bx-scan text-warning'></i> Mulai Telusuri</a>
                <div class="d-flex justify-content-around w-100">
                    <button type="button" class="btn-map btn btn-warning rounded-circle"  data-bs-toggle="modal" data-bs-target="#modal-map"><img src="{{ asset('assets/img/map-icon.png') }}" width="18" class="mb-1"></button>
                    <button class="btn btn-warning rounded-circle ms-5" data-bs-target="#modal-info" data-bs-toggle="modal"><img src="{{ asset('assets/img/info-icon.png') }}" alt="info" width="18" class="mb-1"></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Map -->
    <div class="modal fade" id="modal-map" tabindex="-1" aria-labelledby="modal-map" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
            <div class="modal-content overflow-visible">
                <button type="button" class="btn btn-warning rounded-circle position-absolute top-0 start-100 translate-middle-close z-index-100" data-bs-dismiss="modal" aria-label="Close"><i class='fw-bold bx bx-x'></i></button>
                <div class="modal-body p-0">
                    <img src="{{ asset('assets/img/map.png') }}" alt="logo" class="w-100 vh-100">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Info -->
    <div class="modal fade" id="modal-info" tabindex="-1" aria-labelledby="modal-info" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
            <div class="modal-content overflow-visible">
                <button type="button" class="btn btn-warning rounded-circle position-absolute top-0 start-98 translate-middle z-index-100" data-bs-dismiss="modal" aria-label="Close"><i class='fw-bold bx bx-x'></i></button>
                <div class="modal-body">
                    <p class="text-center fw-bold mb-1">Cara Penggunaan</p>
                    <p class="text-center fs-3 fw-bold">Augmented Journey</p>
                </div>
            </div>
        </div>
    </div>
@endsection
