@extends('master_event')
@section('title', 'Registrasi User')
@section('content')
    {{-- icon --}}
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>

    <div class="vh-100 vw-100 row justify-content-center bg-event-primary m-0">
        <div class="col-lg-4 col-12 col-md-5 p-0">
            <div class="position-relative">
                <div class="vh-100 w-100 d-flex justify-content-center align-items-center position-absolute z-20">
                    <div class="card rounded-3 shadow-lg my-5 bg-event-primary">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        {{-- logo --}}
                                        <div class="d-flex justify-content-center">
                                            <img src="https://placehold.co/96x96" alt="logo" width="96" class="mb-3">
                                        </div>
                                        {{-- login --}}
                                        <div class="text-center">
                                            <h1 class="h4 text-warning mb-4 fw-bold">REGISTER <br> PAMA EVENT</h1>
                                        </div>

                                        <form class="user" method="POST" action="{{ route('user.register.add') }}">
                                            @csrf
                                            {{-- Name --}}
                                            <div class="form-group mb-3 ">
                                                <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror rounded-pill"
                                                       placeholder="Nama" name="name">
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @endif
                                            </div>
                                            {{-- username --}}
                                            <div class="form-group mb-3">
                                                <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror rounded-pill"
                                                       placeholder="Username" name="username">
                                                @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @endif
                                            </div>
                                            {{-- password --}}
                                            <div class="form-group mb-3">
                                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror rounded-pill"
                                                       placeholder="Password" name="password">
                                                @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @endif
                                            </div>
                                            {{-- register button --}}
                                            <div class="d-grid">
                                                <button class="btn btn-warning btn-user btn-block text-event-primary fw-bold">
                                                    Register
                                                </button>
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
                    <img src="{{ asset('assets/img/gameplay/bg.jpg') }}" alt="" class="img-fluid min-vh-100">
                </div>
                {{-- parralax effect--}}
                <div class="position-absolute">
                    {{--<img src="{{ asset('assets/img/gameplay/bglayer2.png') }}" alt="" class="img-fluid min-vh-100">--}}
                </div>
            </div>
        </div>
    </div>
@endsection
