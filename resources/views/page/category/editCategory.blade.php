@extends('template.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/supplier.css') }}">
@endsection

@section('content')

<div class="container body pt-5">
    <div class="row">
        <div class="col-12">
            <div class="pb-4 text-center">
                <h1>Edit Kategori</h1>
            </div>
            <div class="px-5">
                <form action="/category/edit/action" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="{{ $category['id'] }}">
                        <input type="hidden" name="user" id="user" value="{{ session('user')['id'] }}">
                        <div class="row pb-2 d-flex align-items-center">
                            <div class="col-2">
                                <label class="h5" for="namaKategori">Nama Kategori</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-5">
                                <input type="text" name="categoryName" id="categoryName" class="form-control" value="{{ $category['categoryName'] }}">
                            </div>
                        </div>
                        <div class="row pb-2 d-flex align-items-center">
                            <div class="col-2">
                                <label class="h5" for="kodeKategori">Kode Kategori</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7">
                                <h5>{{ $category['categoryCode'] }}</h5>
                                <input type="hidden" name="categoryCode" id="categoryCode" class="form-control" value="{{ $category['categoryCode'] }}">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center pt-4">
                                <input type="submit" class="btn btn-info btn-lg" value="Edit Kategori">
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
                text: "Update Admin Sukses"
            });
        });
        @elseif(session('status') == 'failed')
        $(document).ready(function() {
                Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "Update Admin Gagal, Masukan Data Dengan Benar!"
            });
        });
        @endif
	    $('#table').DataTable();
});
</script>
@endsection