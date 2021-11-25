@extends('template.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/purchasing.css') }}">
@endsection

@section('content')

<div class="container body pt-5">
    <div class="row">
        <div class="col-12">
            <div class="pb-4 text-center">
                <h1>Buat Pembelian</h1>
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
                                <select class="form-control" name="namaBarang" id="namaBarang">
                                    <option value="1">Nama Barang</option>
                                </select>
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
                                <label class="h5" for="harga">Harga Beli</label>
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
                                <label class="h5" for="jumlah">Jumlah Beli</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-2">
                                <input type="text" name="jumlah" id="jumlah" class="form-control">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="supplier">Supplier</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-2">
                                <select name="kodeSupplier" id="kodeSupplier" class="form-control">
                                    <option value="1">Nama Supplier</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="tanggal">Tanggal</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-2">
                                <input type="date" name="tanggal" id="tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="total">Total Harga</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-2">
                                <input type="text" name="total" id="total" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center pt-4">
                                <input type="submit" class="btn btn-info btn-lg" value="Buat Pembelian">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <div class="p-4 text-center">
                <h1>Bayar Pembelian</h1>
            </div>
            <table id="table" class="table table-bordered">
                <thead class="thead-dark">
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Beli</th>
                    <th>Harga Beli</th>
                    <th>Supplier</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tr>
                    <td>SABUN01</td>
                    <td>Body Wash</td>
                    <td>40</td>
                    <td>Rp. 18.000</td>
                    <td>Bang Tobi</td>
                    <td>20/10/2021</td>
                    <td>Arrived</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Bayar</button>
                    </td>
                </tr>
                <tr>
                    <td>SABUN01</td>
                    <td>Body Wash</td>
                    <td>40</td>
                    <td>Rp. 18.000</td>
                    <td>Bang Tobi</td>
                    <td>20/10/2021</td>
                    <td>Arrived</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Bayar</button>
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