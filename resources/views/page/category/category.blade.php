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
                <h1>Buat Kategori Barang Baru</h1>
            </div>
            <div class="px-5">
                <form action="category/addCategory" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="user" id="user" value="{{ session('user')['id'] }}">
                    <div class="form-group">
                        <div class="row pb-2">
                            <div class="col-3">
                                <label class="h5" for="namaKategori">Nama Kategori <span class="require-star" id="namakategori">*</span></label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7">
                                @if($errors->any())
                                    @if($errors->first('CategoryName'))
                                        <input type="text" class="alert alert-danger col-12" name="categoryName" onkeyup="inputFunction('categoryName','namakategori')" id="categoryName" class="form-control">
                                    @else
                                        <input type="text" name="categoryName" onkeyup="inputFunction('categoryName','namakategori')" id="categoryName" class="form-control"  value="{{ session('msg')['categoryName'] }}">
                                    @endif
                                @else
                                    <input type="text" name="categoryName" onkeyup="inputFunction('categoryName','namakategori')" id="categoryName" class="form-control">
                                @endif
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-3">
                                <label class="h5" for="categoryCode">Kode Kategori <span class="require-star" id="kodekategori">*</span></label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7" >
                                @if($errors->any())
                                    @if($errors->first('categoryCode'))
                                        <input type="text" class="alert alert-danger col-12" name="categoryCode" onkeyup="inputFunction('categoryCode','kodekategori')" id="categoryCode" class="form-control">
                                    @else
                                        <input type="text" name="categoryCode" onkeyup="inputFunction('categoryCode','kodekategori')" id="categoryCode" class="form-control"  value="{{ session('msg')['categoryCode'] }}">
                                    @endif
                                @else
                                    <input type="text" name="categoryCode" onkeyup="inputFunction('categoryCode','kodekategori')" id="categoryCode" class="form-control">
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center pt-4">
                                <input type="submit" class="btn btn-info btn-lg" value="Buat Kategori">
                            </div>
                        </div>
                    </>
                </form>
            </div>
            <hr>
            <div class="p-4 text-center">
                <h1>Daftar Kategori</h1>
            </div>
            <table id="table" class="table table-bordered">
                <thead class="thead-dark">
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Created By</th>
                    <th>Updated By</th>
                    <th>Edit</th>
                </thead>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category['categoryCode'] }}</td>
                    <td>{{ $category['categoryName'] }}</td>
                    <td>{{ $category['createdby']->name }}</td>
                    <td>{{ $category['updatedby']->name }}</td>
                    
                    <td>
                        <a href="{{ url('category/edit/' . $category['id']) }}"><button class="btn btn-sm btn-primary">Edit</button></a>
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
        var nama = document.getElementById('categoryName').value;
        var kode = document.getElementById('categoryCode').value;
        if(nama != ''){
            document.getElementById('namakategori').style.display = 'none';
        }else if(nama == ''){
            document.getElementById('namakategori').style.display = 'inline';
        }
        if(kode != ''){
            document.getElementById('kodekategori').style.display = 'none';
        }else if(kode == ''){
            document.getElementById('kodekategori').style.display = 'inline';
        }
    }
    $(document).ready(function() {
        @if(session('status') == 'success')
        $(document).ready(function() {
                Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: "Tambah Kategori Baru Sukses",
                showCloseButton : true
            });
        });
        @elseif(session('status') == 'failed')
        $(document).ready(function() {
                Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "Tambah Kategori Baru Gagal, Isi Data Dengan Benar!",    
                showCloseButton : true
            });
        });
        @endif
	    $('#table').DataTable();
});
</script>
@endsection