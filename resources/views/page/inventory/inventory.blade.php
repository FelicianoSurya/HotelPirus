@extends('template.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/inventory.css') }}">

@endsection

@section('content')

<body onload="inputFunction1()">

</body>
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
                            <div class="col-3">
                                <label class="h5" for="namaBarang">Nama Barang <span class="require-star" id="namabarang">*</span></label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7">
                                @if($errors->any())
                                    @if($errors->first('inventoryName'))
                                        <input type="text" class="alert alert-danger col-12" name="inventoryName" onkeyup="inputFunction('inventoryName','namabarang')" id="inventoryName" class="form-control">
                                    @else
                                        <input type="text" name="inventoryName" onkeyup="inputFunction('inventoryName','namabarang')" id="inventoryName" class="form-control"  value="{{ session('msg')['inventoryName'] }}">
                                    @endif
                                @else
                                    <input type="text" name="inventoryName" onkeyup="inputFunction('inventoryName','namabarang')" id="inventoryName" class="form-control">
                                @endif
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-3">
                                <label class="h5" for="kodekategori">Kode Kategori</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7">
                                <input type="text" id="kodekategori" disabled class="form-control">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-3">
                                <label class="h5" for="namaKategori">Kategori Barang <span class="require-star" id="kategoribarang">*</span></label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7">
                                <select class="form-control" name="categoryID" id="categoryID" onchange="inputFunction('categoryID','kategoribarang')">
                                    <option value="">Nama Kategori</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['categoryName'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-3">
                                <label class="h5" for="kodeBarang">Kode Barang <span class="require-star" id="kodebarang">*</span></label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7">
                                @if($errors->any())
                                    @if($errors->first('inventoryCode'))
                                        <input type="text" class="alert alert-danger col-12" name="inventoryCode" onkeyup="inputFunction('inventoryCode','kodebarang')" id="inventoryCode" class="form-control">
                                    @else
                                        <input type="text" name="inventoryCode" onkeyup="inputFunction('inventoryCode','kodebarang')" id="inventoryCode" class="form-control"  value="{{ session('msg')['inventoryCode'] }}">
                                    @endif
                                @else
                                    <input type="text" name="inventoryCode" onkeyup="inputFunction('inventoryCode','kodebarang')" id="inventoryCode" class="form-control">
                                @endif
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-3">
                                <label class="h5" for="stok">Jumlah Stok <span class="require-star" id="jumlahstok">*</span></label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-2">
                                @if($errors->any())
                                    @if($errors->first('stock'))
                                        <input type="text" class="alert alert-danger col-12" name="stock" onkeyup="inputFunction('stock','jumlahstok')" id="stock" class="form-control">
                                    @else
                                        <input type="number" name="stock" onkeyup="inputFunction('stock','jumlahstok')" id="stock" class="form-control" value="{{ session('msg')['stock'] }}">
                                    @endif
                                @else
                                    <input type="number" name="stock" onkeyup="inputFunction('stock','jumlahstok')" id="stock" class="form-control">
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
                    <th>Kategori Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Stok</th>
                    <th>Created By</th>
                    <th>Updated By</th>
                    <th>Edit</th>
                </thead>
                @foreach($inventories as $inventory)
                <tr>
                    <td>{{ $inventory['inventoryCode'] }}</td>
                    <td class="text-center">{{ $inventory['kategori']->categoryName }}</td>
                    <td>{{ $inventory['inventoryName'] }}</td>
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
        var nama = document.getElementById('inventoryName').value;
        var kategori = document.getElementById('categoryID').value;
        var kode = document.getElementById('inventoryCode').value;
        var stock = document.getElementById('stock').value;
        if(nama != ''){
            document.getElementById('namabarang').style.display = 'none';
        }else if(nama == ''){
            document.getElementById('namabarang').style.display = 'inline';
        }
        if(kategori != ''){
            document.getElementById('kategoribarang').style.display = 'none';
        }else if(kategori == ''){
            document.getElementById('kategoribarang').style.display = 'inline';
        }
        if(kode != ''){
            document.getElementById('kodebarang').style.display = 'none';
        }else if(kode == ''){
            document.getElementById('kodebarang').style.display = 'inline';
        }
        if(stock != ''){
            document.getElementById('jumlahstok').style.display = 'none';
        }else if(stock == ''){
            document.getElementById('jumlahstok').style.display = 'inline';
        }
    }
    $(document).ready(function() {
        $('#categoryID').change(function(){
            var id = $(this).val();
            $.ajax({
                url : "getCategory/" + id,
                method : "GET",
                data : {
                    id : id,
                },
                success : function(result){
                    $('#kodekategori').val(result.categoryCode);
                }
            });
        });
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