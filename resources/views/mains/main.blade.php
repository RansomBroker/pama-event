@extends('master_event')
@section('title', 'Pama Event')
@section('content')
    <div class="vh-100 vw-100 row justify-content-center bg-event-primary m-0">
        <div class="col-lg-4 col-12 col-md-5 row p-0">
            <div class="position-relative p-0">
                {{-- form --}}
                <div class="min-vh-100 w-100 row col-12 p-0 m-0 position-absolute z-20">
                    <div class="col-12 d-flex justify-content-end">
                        <img src="https://placehold.co/64x64" alt="logo" width="64" class="">
                    </div>
                    {{-- logo & text --}}
                    <div class="col-12 d-flex mt-5-rem flex-column align-items-center">
                        <img src="https://placehold.co/256x64" alt="logo" width="256" class="mb-3">
                    </div>
                    {{-- button --}}
                    <div class="col-12 d-flex flex-column justify-content-end align-items-center mb-5">
                        <a href="{{ route('event.play') }}" class="btn bg-event-primary text-white fw-bold px-5 rounded-pill mb-2"><i class='bx bx-scan text-warning'></i> Mulai Telusuri</a>
                        <div class="d-flex justify-content-around w-100">
                            <button type="button" class="btn-map btn btn-warning rounded-circle"  data-bs-toggle="modal" data-bs-target="#modal-leaderboard"><img src="{{ asset('assets/img/map-icon.png') }}" width="18" class="mb-1"></button>
                            <button class="btn btn-warning rounded-circle ms-5" data-bs-target="#modal-info" data-bs-toggle="modal"><img src="{{ asset('assets/img/info-icon.png') }}" alt="info" width="18" class="mb-1"></button>
                        </div>
                    </div>
                </div>
                {{-- bg --}}
                <div class="position-absolute">
                    <img src="{{ asset('assets/img/gameplay/bg.jpg') }}" alt="" class="img-fluid min-vh-100">
                </div>
                {{-- parralax effect--}}
                <div class="position-absolute">
                    <img src="{{ asset('assets/img/gameplay/bglayer2.png') }}" alt="" class="img-fluid min-vh-100 floating">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Leaderboard -->
    <div class="modal fade" id="modal-leaderboard" tabindex="-1" aria-labelledby="modal-leaderboard" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content card-leaderboard card-body overflow-visible">
                {{-- leaderboard img--}}
                <img src="{{ asset('assets/img/leaderboard/leaderboard.png') }}" class="position-absolute top--29 start-50 translate-middle" alt="" width="256px">
                {{-- acc --}}
                <div class="w-100 d-flex justify-content-between mb-3">
                    <img src="{{ asset('assets/img/leaderboard/hiasanpojokbg.png') }}" alt="" width="24px">
                    <img src="{{ asset('assets/img/leaderboard/hiasanpojokbg.png') }}" alt="" width="24px">
                </div>
                {{-- table --}}
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center text-white">Nama</th>
                            <th class="text-center text-white">Point</th>
                            <th class="text-center text-white"><span class="text-zero">asdf</span></th>
                        </tr>
                    </thead>
                    <tbody class="leaderboard-data">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- modal history--}}
    <div class="modal fade" tabindex="-1" id="history">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">History Redeem <span class="history-name">{name}</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Leaderboard --}}
                    <table class="table table-hover table-bordered table-striped mt-5" id="modal-table-history">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">History Redeem Booth</th>
                        </tr>
                        </thead>
                        <tbody class="data-history">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
@section('custom-js')
    <script>
        $(document).ready(function() {
            /* history */
            $(document).on('click', '.btn-history',function () {
                let userId = $(this).attr('data-id')
                let history = new bootstrap.Modal(document.getElementById('history'), {
                    keyboard: false
                })

                $.ajax({
                    url: '/leaderboard/user/history/' + userId,
                    success: function (data) {
                        let histories = data;
                        $('.history-name').text(histories[userId][0].user.name)
                        $('.data-history').empty()
                        histories[userId].forEach((history) => {
                            $('.data-history').append(`
                                <tr class="text-center">
                                    <th scope="col">${history.booth.name}</th>
                                </tr>
                            `)
                        })
                        history.show();
                    }
                })
            })

            /* get new score */
            function leaderboard() {
                $.ajax({
                    url: '/leaderboard/get',
                    success: function (data) {
                        let html = ``;
                        let i =1;
                        data.forEach((leaderboardGroup) => {
                            html +=`
                                   <tr>
                                       <td class="text-white fw-bold border-white bg-table-wave-long-desktop">
                                            <span class="text-white px-3 pt-2 pb-3 fw-bold bg-point me-2">${i++}</span>
                                            ${leaderboardGroup[0].user.name}
                                       </td>
                                       <td class="text-center text-white border-white bg-table-wave-short-desktop">${leaderboardGroup.length} <img src="{{ asset('assets/img/leaderboard/diamond.png') }}" alt="" width="18px"></td>
                                       <td class="text-center border-white bg-table-wave-long-desktop"><button class="btn-history btn bg-event-primary text-warning" data-id="${leaderboardGroup[0].user_id}">Riwayat</button></td>
                                   </tr>
                                `
                            $('.leaderboard-data').html(html)
                        })
                    },
                    complete: function (data) {
                        setTimeout(leaderboard, 1000);
                    }
                })
            }
            setTimeout(leaderboard, 1000);
        })
    </script>
@endsection
