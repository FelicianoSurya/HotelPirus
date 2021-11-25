@extends('template.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/supplier.css') }}">
@endsection

@section('content')

<div class="container body pt-5">
    <div class="row">
        <div class="col-12">
            <div class="pb-4 text-center">
                <h1>Tambah Supplier Baru</h1>
            </div>
            <div class="px-5">
                <form>
                    <div class="form-group">
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="namaSupplier">Nama Supplier</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7">
                                <input type="text" name="namaSupplier" id="namaSupplier" class="form-control">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="kodeSupplier">Kode Supplier</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7">
                                <input type="text" name="kodeSupplier" id="kodeSupplier" class="form-control">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="alamat">Alamat Supplier</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-5">
                                <input type="text" name="alamat" id="alamat" class="form-control">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="telp">Telp. Supplier</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-2">
                                <input type="text" name="telp" id="telp" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center pt-4">
                                <input type="submit" class="btn btn-info btn-lg" value="Tambah Supplier">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <div class="p-4 text-center">
                <h1>Daftar Inventory</h1>
            </div>
            <table id="table" class="table table-bordered">
                <thead class="thead-dark">
                    <th>Kode Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Alamat Supplier</th>
                    <th>No. Telp Supplier</th>
                </thead>
                <tr>
                    <td>SABUN01</td>
                    <td>Body Wash</td>
                    <td>40</td>
                    <td>Rp. 18.000</td>
                </tr>
                <tr>
                    <td>SABUN01</td>
                    <td>Body Wash</td>
                    <td>40</td>
                    <td>Rp. 18.000</td>
                </tr>
                <tr>
                    <td>SABUN01</td>
                    <td>Body Wash</td>
                    <td>40</td>
                    <td>Rp. 18.000</td>
                </tr>
                <tr>
                    <td>SABUN01</td>
                    <td>Body Wash</td>
                    <td>40</td>
                    <td>Rp. 18.000</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection

@section('custom-js')
<script>
    $(document).ready(function() {
	    $('#table').DataTable();
});
</script>
@endsection