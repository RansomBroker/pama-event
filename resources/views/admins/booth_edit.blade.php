@extends('master_admin')
@section('title', 'Edit Booth')
@section('sidebar')
    @include('includes.sidebar')
@endsection
@section('navbar')
    @include('includes.navbar')
@endsection
@section('footer', '')
@section('content')
    <h2>Edit Booth</h2>
    <div class="card card-body">
        <form action="{{ route('admin.booth.edit', $booth->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label class="form-label"> Nama Booth <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" name="name" required value="{{ $booth->name}}">
            </div>
            <button class="btn btn-primary col-lg-12 col-12">Tambah Booth Baru</button>
        </form>
    </div>
@endsection

