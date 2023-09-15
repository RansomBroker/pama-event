@extends('master_event')
@section('title', 'Pama Event')
@section('content')
    <div class="min-vh-100 container-fluid m-0 p-0 row justify-content-center">
        <div class="col-lg-8 col-12 col-md-8 d-flex justify-content-center position-absolute top-15 start-50 translate-middle-x">
            <div class="w-100 card-leaderboard card-body overflow-visible">
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
                        let i = 1;
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
