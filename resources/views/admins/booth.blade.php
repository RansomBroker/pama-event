@extends('master_admin')
@section('title', 'Kelola Booth')
@section('sidebar')
    @include('includes.admins.sidebar')
@endsection
@section('navbar')
    @include('includes.admins.navbar')
@endsection
@section('footer', '')
@section('content')
    <h2>Kelola Data Booth</h2>
    <div class="card card-body">
        <a href="{{  route('admin.booth.add.view') }}" class="btn btn-primary col-lg-2 col-12 mb-3 ">Tambah Booth Baru</a>

        @if($status = Session::get('status'))
            @if($message = Session::get('message'))
                <div class="alert alert-{{ $status }} alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        @endif

        <div class="my-2 table-responsive">
            <table class="table table-striped table-hover text-nowrap w-100" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Booth</th>
                        <th>Link Tautan Redeem Code</th>
                        <th>Link Tautan Booth Visitor</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @php($i = 1)
                @foreach($booths as $booth)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $booth->name }}</td>
                        <td><a href="{{ url('redeem/'.$booth->slug) }}" target="_blank">{{ url('redeem/'.$booth->slug) }}</a></td>
                        <td><a href="{{ url('booth/'.$booth->slug) }}" target="_blank">{{ url('booth/'.$booth->slug) }}</a></td>
                        <td>
                            <form action="{{ route('admin.booth.delete', $booth->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                            <a href="{{ route('admin.booth.edit.view', $booth->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

