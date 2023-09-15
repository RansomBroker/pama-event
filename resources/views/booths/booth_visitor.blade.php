@extends('master_admin')
@section('title', 'Visitor Booth '. $booth->name)
@section('sidebar')
    @include('includes.admins.booth_sidebar')
@endsection
@section('navbar')
    @include('includes.admins.booth_navbar')
@endsection
@section('content')
    <h2>Data Redeem</h2>
    <div class="card card-body">

        <div class="my-2 table-responsive">
            <table class="table table-striped table-hover text-nowrap w-100" id="table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Redeem Code</th>
                    <th>Tanggal</th>
                </tr>
                </thead>
                <tbody>
                @php($i = 1)
                @foreach($redeemData as $redeem)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $redeem->user->name }}</td>
                        <td>{{ $redeem->code }}</td>
                        <td>{{ $redeem->created_at  }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

