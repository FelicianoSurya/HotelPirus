@extends('template.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/supplier.css') }}">
@endsection

@section('content')

<body onload="inputFunction1()">
</body>
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
                            <div class="col-3">
                                <label class="h5" for="namaSupplier">Nama Supplier <span class="require-star" id="namasupplier">*</span></label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7">
                                @if($errors->any())
                                    @if($errors->first('supplierName'))
                                        <input type="text" class="alert alert-danger col-12" name="supplierName" onkeyup="inputFunction('supplierName','namasupplier')" id="supplierName" class="form-control">
                                    @else
                                        <input type="text" name="supplierName" onkeyup="inputFunction('supplierName','namasupplier')" id="supplierName" class="form-control" value="{{ session('msg')['supplierName'] }}">
                                    @endif
                                @else
                                    <input type="text" name="supplierName" onkeyup="inputFunction('supplierName','namasupplier')" id="supplierName" class="form-control">
                                @endif
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-3">
                                <label class="h5" for="kodeSupplier">Kode Supplier <span class="require-star" id="kodesupplier">*</span></label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7">
                                @if($errors->any())
                                    @if($errors->first('supplierCode'))
                                    <input type="text" class="alert alert-danger col-12" name="supplierCode" onkeyup="inputFunction('supplierCode','kodesupplier')" id="supplierCode" class="form-control">
                                    @else
                                    <input type="text" name="supplierCode" onkeyup="inputFunction('supplierCode','kodesupplier')" id="supplierCode" class="form-control" value="{{ session('msg')['supplierCode'] }}">
                                    @endif
                                @else
                                    <input type="text" name="supplierCode" onkeyup="inputFunction('supplierCode','kodesupplier')" id="supplierCode" class="form-control">
                                @endif
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-3">
                                <label class="h5" for="alamat">Alamat Supplier <span class="require-star" id="alamat">*</span></label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-5">
                                @if($errors->any())
                                    @if($errors->first('address'))
                                        <input type="text" class="alert alert-danger col-12" name="address" onkeyup="inputFunction('address','alamat')" id="address" class="form-control">
                                    @else
                                        <input type="text" name="address" onkeyup="inputFunction('address','alamat')" id="address" class="form-control" value="{{ session('msg')['address'] }}">
                                    @endif
                                @else
                                    <input type="text" name="address" onkeyup="inputFunction('address','alamat')" id="address" class="form-control">
                                @endif
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-3">
                                <label class="h5" for="telp">Telp. Supplier <span class="require-star" id="telp">*</span></label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-2">
                                @if($errors->any())
                                @if($errors->first('phoneNumber'))
                                    <input type="number" class="alert alert-danger col-12" name="phoneNumber" onkeyup="inputFunction('phoneNumber','telp')" id="phoneNumber" class="form-control">
                                @else
                                    <input type="number" name="phoneNumber" onkeyup="inputFunction('phoneNumber','telp')" id="phoneNumber" class="form-control" value="{{ session('msg')['phoneNumber'] }}">
                                @endif
                                @else
                                    <input type="number" name="phoneNumber" onkeyup="inputFunction('phoneNumber','telp')" id="phoneNumber" class="form-control">
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
                    <th>Aksi</th>
                </thead>
                @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier['supplierCode'] }}</td>
                    <td>{{ $supplier['supplierName'] }}</td>
                    <td>{{ $supplier['address'] }}</td>
                    <td>{{ $supplier['phoneNumber'] }}</td>
                    <td>{{ $supplier['createdby']->name }}</td>
                    <td>{{ $supplier['updatedby']->name }}</td>
                    <td>
                        <a href="{{ url('supplier/edit/' . $supplier['id']) }}"><button class="btn btn-sm btn-primary">Edit</button></a>
                        <!-- <a onclick="return confirm('Hapus Supplier Yang Dipilih?')" href="{{ url('supplier/delete/' . $supplier['id']) }}"><button class="btn btn-sm btn-danger">Delete</button></a> -->
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
    function inputFunction(a,title){
        var value = document.getElementById(a).value;
        console.log(value)
        if(value != ''){
            document.getElementById(title).style.display = 'none';
        }else if(value == ''){
            document.getElementById(title).style.display = 'inline';
        }
    }
    function inputFunction1(){
        var nama = document.getElementById('supplierName').value;
        var alamat = document.getElementById('address').value;
        var kode = document.getElementById('supplierCode').value;
        var telp = document.getElementById('phoneNumber').value;
        if(nama != ''){
            document.getElementById('namasupplier').style.display = 'none';
        }else if(nama == ''){
            document.getElementById('namasupplier').style.display = 'inline';
        }
        if(alamat != ''){
            document.getElementById('alamat').style.display = 'none';
        }else if(alamat == ''){
            document.getElementById('alamat').style.display = 'inline';
        }
        if(kode != ''){
            document.getElementById('kodesupplier').style.display = 'none';
        }else if(kode == ''){
            document.getElementById('kodesupplier').style.display = 'inline';
        }
        if(telp != ''){
            document.getElementById('telp').style.display = 'none';
        }else if(telp == ''){
            document.getElementById('telp').style.display = 'inline';
        }
    }
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