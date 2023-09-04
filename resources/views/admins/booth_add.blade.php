@extends('master_admin')
@section('title', 'Tambah Booth Baru')
@section('sidebar')
    @include('includes.admins.sidebar')
@endsection
@section('navbar')
    @include('includes.adminsnavbar')
@endsection
@section('footer', '')
@section('content')
    <h2>Tambah Booth Baru</h2>
    <div class="card card-body">
        <form action="{{ route('admin.booth.add') }}" method="post">
            @csrf
            <div class="form-group">
                <label class="form-label"> Nama Booth <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <button class="btn btn-primary col-lg-12 col-12">Tambah Booth Baru</button>
        </form>
    </div>
@endsection

