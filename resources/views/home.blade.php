@extends('template.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@endsection

@section('content')

<div class="container-fluid d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row text-center">
            <div class="col-6 p-3">
                <a href="{{ route('inventory') }}">
                <div class="col-12 box inventory p-5">
                    <h3>Cek Inventory</h3>
                    <img src="{{ asset('images/inventory.png') }}" alt="inventory">
                </div>
                </a>
            </div>
            <div class="col-6 p-3">
                <a href="{{ route('purchasing') }}">
                <div class="col-12 box purchasing p-5">
                    <h3>Purchasing</h3>
                    <img src="{{ asset('images/purchasing.png') }}" alt="purchasing">
                </div>
                </a>
            </div>
        </div>
        <br>
        <br>
        <h3 class="text-center">Notifikasi Inventori Dengan Stok Minim</h3>
        <table id="table" class="table table-bordered">
            <thead class="thead-dark">
                <th>Kode Barang</th>
                <th>Kategori Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Stok</th>
            </thead>
            @foreach($inventories as $inventory)
            <tr>
                <td>{{ $inventory['inventoryCode'] }}</td>
                <td class="text-center">{{ $inventory['kategori']->categoryName }}</td>
                <td>{{ $inventory['inventoryName'] }}</td>
                <td>{{ $inventory['stock'] }}</td>
            </tr>
            @endforeach
        </table>
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