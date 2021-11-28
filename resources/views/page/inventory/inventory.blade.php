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
                <form action="inventory/addInventory" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="user" id="user" value="{{ session('user')['id'] }}">
                    <div class="form-group">
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="namaBarang">Nama Barang</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7">
                                @if($errors->any())
                                    @if($errors->first('inventoryName'))
                                        <input type="text" class="alert alert-danger col-12" name="inventoryName" id="inventoryName" class="form-control">
                                    @else
                                        <input type="text" name="inventoryName" id="inventoryName" class="form-control"  value="{{ session('msg')['inventoryName'] }}">
                                    @endif
                                @else
                                    <input type="text" name="inventoryName" id="inventoryName" class="form-control">
                                @endif
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
                                @if($errors->any())
                                    @if($errors->first('inventoryCode'))
                                        <input type="text" class="alert alert-danger col-12" name="inventoryCode" id="inventoryCode" class="form-control">
                                    @else
                                        <input type="text" name="inventoryCode" id="inventoryCode" class="form-control"  value="{{ session('msg')['inventoryCode'] }}">
                                    @endif
                                @else
                                    <input type="text" name="inventoryCode" id="inventoryCode" class="form-control">
                                @endif
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
                                @if($errors->any())
                                    @if($errors->first('stock'))
                                        <input type="text" class="alert alert-danger col-12" name="stock" id="stock" class="form-control">
                                    @else
                                        <input type="number" name="stock" id="stock" class="form-control" value="{{ session('msg')['stock'] }}">
                                    @endif
                                @else
                                    <input type="number" name="stock" id="stock" class="form-control">
                                @endif
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
                    <a href="{{ route('viewPemasukan') }}"><button class="btn btn-danger btn-lg">Cek Barang Masuk</button></a>
                </div>
            </div>
            <table id="table" class="table table-bordered">
                <thead class="thead-dark">
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Stok</th>
                    <th>Created By</th>
                    <th>Updated By</th>
                    <th>Edit</th>
                </thead>
                @foreach($inventories as $inventory)
                <tr>
                    <td>{{ $inventory['inventoryName'] }}</td>
                    <td>{{ $inventory['inventoryCode'] }}</td>
                    <td>{{ $inventory['stock'] }}</td>
                    <td>{{ $inventory['createdby']->name }}</td>
                    <td>{{ $inventory['updatedby']->name }}</td>
                    
                    <td>
                        <a href="{{ url('inventory/edit/' . $inventory['id']) }}"><button class="btn btn-sm btn-primary">Edit</button></a>
                    </td>
                </tr>
                @endforeach
            </table>
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
                text: "Tambah Inventory Baru Sukses",
                showCloseButton : true
            });
        });
        @elseif(session('status') == 'failed')
        $(document).ready(function() {
                Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "Tambah Inventory Baru Gagal, Isi Data Dengan Benar!",    
                showCloseButton : true
            });
        });
        @endif
	    $('#table').DataTable();
});
</script>
@endsection