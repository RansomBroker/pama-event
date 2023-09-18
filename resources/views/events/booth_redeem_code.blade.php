@extends('master_event')
@section('title', 'Booth '. $booth->name)
@section('content')
    <div class="screen vw-100 row justify-content-center bg-event-primary m-0">
        <div class="bg-white col-lg-4 col-12 col-md-5 p-0">
            <div class="position-relative">
                {{-- modal --}}
                <div class="screen-bg w-100 d-flex justify-content-center align-items-center position-absolute z-20">
                    <div class="card rounded-3 shadow-lg my-5 bg-event-primary">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <h6 class="fw-bold text-warning">Hi, {{ Auth::user()->name }}</h6>
                                        <h6 class="fw-bold text-warning"> Selamat Datang di {{ $booth->name }}</h6>
                                        <h6 class="fw-bold text-warning">Reedem Kode Anda:</h6>
                                        <form class="user" method="POST" action="{{ route('event.booth.redeem', $booth->id) }}">
                                            @csrf
                                            <input type="text" class="form-control text-center mb-3" name="code" readonly>
                                            <div class="row justify-content-center">
                                                <button type="submit" class="btn rounded-pill btn-warning col-lg-5 col-5 me-2 fw-bold text-event-primary">Ok</button>
                                                <a href="{{ route('event.index') }}" class="btn rounded-pill btn-danger col-lg-5 col-5 me-2 fw-bold">Cancel</a>
                                            </div>
                                        </form>
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
@section('custom-js')
    <script>
        $(document).ready(function() {
            function randomStr(len, arr) {
                let ans = '';
                for (let i = len; i > 0; i--) {
                    ans +=
                        arr[(Math.floor(Math.random() * arr.length))];
                }
                return ans;
            }

            $('[name=code]').val(randomStr(6, '123456789abccdefghijklmnopqrstuvwxyz'))
        })
    </script>
@endsection
