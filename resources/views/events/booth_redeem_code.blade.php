@extends('master')
@section('title', 'Booth '. $booth->name)
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
                                <h5 class="text-center">Hi {{ Auth::user()->name }}</h5>
                                <h5 class="text-center"> Selamat Datang di {{ $booth->name }}</h5>
                                <h5 class="text-center">Reedem Kode Anda:</h5>
                                <form class="user" method="POST" action="{{ route('event.booth.redeem', $booth->id) }}">
                                    @csrf
                                    <input type="text" class="form-control text-center mb-3" name="code" readonly>
                                    <div class="row justify-content-center">
                                        <button type="submit" class="btn btn-primary col-lg-5 col-5 mr-2">Ok</button>
                                        <a href="{{ route('event.index') }}" class="btn btn-danger col-lg-5 col-5 mr-2">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
