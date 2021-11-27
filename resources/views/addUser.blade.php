@extends('template.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/supplier.css') }}">
@endsection

@section('content')

<div class="container body pt-5">
    <div class="row">
        <div class="col-12">
            <div class="pb-4 text-center">
                <h1>Tambah Admin</h1>
            </div>
            <div class="px-5">
                <form action="add/action" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="row pb-2 d-flex align-items-center">
                            <div class="col-2">
                                <label class="h5" for="username">Id</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-9">
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                        </div>
                        <div class="row pb-2 d-flex align-items-center">
                            <div class="col-2">
                                <label class="h5" for="nama">Nama</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-9">
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>
                        <div class="row pb-2 d-flex align-items-center">
                            <div class="col-2">
                                <label class="h5" for="password">Password</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-9">
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex flex-column align-items-center pt-4">
                                <input type="submit" class="btn btn-info btn-lg" value="Tambah Admin">
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-js')
<script>
    $(document).ready(function() {
        @if(session('status') == 'success')
        $(document).ready(function() {
                Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: "Tambah Admin Baru Sukses"
            });
        });
        @elseif(session('status') == 'failed')
        $(document).ready(function() {
                Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "Tambah Admin Baru Gagal, Isi Data Dengan Benar!"
            });
        });
        @endif
	    $('#table').DataTable();
    });
</script>
@endsection