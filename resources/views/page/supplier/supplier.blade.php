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
                <form action="supplier/add" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="user" id="user" value="{{ session('user')['id'] }}">
                    <div class="form-group">
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="namaSupplier">Nama Supplier</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7">
                                @if($errors->any())
                                    @if($errors->first('supplierName'))
                                        <input type="text" class="alert alert-danger col-12" name="supplierName" id="supplierName" class="form-control">
                                    @else
                                        <input type="text" name="supplierName" id="supplierName" class="form-control" value="{{ session('msg')['supplierName'] }}">
                                    @endif
                                @else
                                    <input type="text" name="supplierName" id="supplierName" class="form-control">
                                @endif
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
                                @if($errors->any())
                                    @if($errors->first('supplierCode'))
                                    <input type="text" class="alert alert-danger col-12" name="supplierCode" id="supplierCode" class="form-control">
                                    @else
                                    <input type="text" name="supplierCode" id="supplierCode" class="form-control" value="{{ session('msg')['supplierCode'] }}">
                                    @endif
                                @else
                                    <input type="text" name="supplierCode" id="supplierCode" class="form-control">
                                @endif
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
                                @if($errors->any())
                                    @if($errors->first('address'))
                                        <input type="text" class="alert alert-danger col-12" name="address" id="address" class="form-control">
                                    @else
                                        <input type="text" name="address" id="address" class="form-control" value="{{ session('msg')['address'] }}">
                                    @endif
                                @else
                                    <input type="text" name="address" id="address" class="form-control">
                                @endif
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
                                @if($errors->any())
                                @if($errors->first('phoneNumber'))
                                    <input type="number" class="alert alert-danger col-12" name="phoneNumber" id="phoneNumber" class="form-control">
                                @else
                                    <input type="number" name="phoneNumber" id="phoneNumber" class="form-control" value="{{ session('msg')['phoneNumber'] }}">
                                @endif
                                @else
                                    <input type="number" name="phoneNumber" id="phoneNumber" class="form-control">
                                @endif
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
                <h1>Daftar Supplier</h1>
            </div>
            <table id="table" class="table table-bordered">
                <thead class="thead-dark">
                    <th>Kode Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Alamat Supplier</th>
                    <th>No. Telp Supplier</th>
                    <th>Created By</th>
                    <th>Last Edited</th>
                    <!-- <th>Aksi</th> -->
                </thead>
                @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier['supplierCode'] }}</td>
                    <td>{{ $supplier['supplierName'] }}</td>
                    <td>{{ $supplier['address'] }}</td>
                    <td>{{ $supplier['phoneNumber'] }}</td>
                    <td>{{ $supplier['createdby']->name }}</td>
                    <td>{{ $supplier['updatedby']->name }}</td>
                    <!-- <td>
                        <a href="{{ url('supplier/edit/' . $supplier['id']) }}"><button class="btn btn-sm btn-primary">Edit</button></a>
                        <a onclick="return confirm('Hapus Supplier Yang Dipilih?')" href="{{ url('supplier/delete/' . $supplier['id']) }}"><button class="btn btn-sm btn-danger">Delete</button></a>
                    </td> -->
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
                text: "Tambah Supplier Baru Sukses",
                Button : 'Ok'
            });
        });
        @elseif(session('status') == 'failed')
        $(document).ready(function() {
                Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "Tambah Supplier Baru Gagal, Isi Data Dengan Benar!",    
                Button : 'Ok'
            });
        });
        @elseif(session('msg'))
        $(document).ready(function() {
                Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "Supplier Terpilih Berhasil Dihapus!",    
                Button : 'Ok'
            });
        });
        @endif
	    $('#table').DataTable();
});
</script>
@endsection