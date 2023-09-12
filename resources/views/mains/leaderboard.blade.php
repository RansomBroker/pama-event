@extends('master_event')
@section('title', 'Pama Event')
@section('content')
    <div class="container-fluid m-0 d-flex justify-content-center">
        <div class="bg-white col-lg-6 col-12 col-md-5 row ">
            <div class="col-12 d-flex mt-3 flex-column align-items-center">

                <div class="bg-event-primary px-4 py-2">
                    <span class="text-warning fw-bold fs-4">Leaderboard</span>
                </div>

                {{-- Leaderboard --}}
                <table class="table table-hover table-bordered table-striped mt-5">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Nama</th>
                            <th scope="col">Point</th>
                            <th></th>
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
                        data.forEach((leaderboardGroup) => {
                            html +=`
                                   <tr>
                                        <th>${leaderboardGroup[0].user.name}</th>
                                        <td class="text-center">${leaderboardGroup.length}</td>
                                        <td class="text-center"><button class="btn-history btn bg-event-primary text-warning" data-id="${leaderboardGroup[0].user_id}">Riwayat</button></td>
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
