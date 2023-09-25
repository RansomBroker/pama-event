@extends('master_admin')
@section('title', 'Dashboard')
@section('sidebar')
    @include('includes.admins.sidebar')
@endsection
@section('navbar')
    @include('includes.admins.navbar')
@endsection
@section('footer', '')
@section('content')
    <h2>Dashboard</h2>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Users Redeem</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 redeem-count-text">0</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-js')
    <script>
        $(document).ready(function () {
            function getUserRedeem() {
                $.ajax({
                    url: '/admin/get/user-redeem',
                    success: function (response) {
                        $('.redeem-count-text').text(response)
                    },
                    complete: function (data) {
                        setTimeout(getUserRedeem, 1000);
                    }
                })
            }

            setTimeout(getUserRedeem, 1000);
        })
    </script>
@endsection
