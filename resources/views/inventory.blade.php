@extends('template.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/inventory.css') }}">

@endsection

@section('content')

<div class="container body pt-5">
    <div class="row">
        <div class="col-12">
            <div class="pb-4 text-center">
                <h1>Tambah Item Baru</h1>
            </div>
            <div class="px-5">
                <form>
                    <div class="form-group">
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="namaBarang">Nama Barang</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7">
                                <input type="text" name="namaBarang" id="namaBarang" class="form-control">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="kodeBarang">Kode Barang</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7">
                                <input type="text" name="kodeBarang" id="kodeBarang" class="form-control">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="hargaBeli">Harga Beli</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-5">
                                <input type="text" name="harga" id="harga" class="form-control">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="stok">Jumlah Stok</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-2">
                                <input type="text" name="stok" id="stok" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center pt-4">
                                <input type="submit" class="btn btn-info btn-lg" value="Tambah Produk">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <div class="p-4 text-center">
                <h1>Daftar Inventory</h1>
            </div>
            <div class="row">
                <div class="col-12 pb-3 d-flex justify-content-end">
                    <button class="btn btn-danger btn-lg">Cek Barang Masuk</button>
                </div>
            </div>
            <table id="table" class="table table-bordered">
                <thead class="thead-dark">
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Stok</th>
                    <th>Harga Beli</th>
                    <th>Edit</th>
                </thead>
                <tr>
                    <td>SABUN01</td>
                    <td>Body Wash</td>
                    <td>40</td>
                    <td>Rp. 18.000</td>
                    <td>
                        <button class="btn btn-sm btn-primary">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td>SABUN01</td>
                    <td>Body Wash</td>
                    <td>40</td>
                    <td>Rp. 18.000</td>
                    <td>
                        <button class="btn btn-sm btn-primary">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td>SABUN01</td>
                    <td>Body Wash</td>
                    <td>40</td>
                    <td>Rp. 18.000</td>
                    <td>
                        <button class="btn btn-sm btn-primary">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td>SABUN01</td>
                    <td>Body Wash</td>
                    <td>40</td>
                    <td>Rp. 18.000</td>
                    <td>
                        <button class="btn btn-sm btn-primary">Edit</button>
                    </td>
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