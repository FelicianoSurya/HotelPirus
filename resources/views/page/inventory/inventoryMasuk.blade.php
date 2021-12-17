@extends('template.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/purchasing.css') }}">
@endsection

@section('content')

<div class="container body pt-5">
    <div class="row">
        <div class="col-12">
            <div class="pb-4 text-center">
                <h1>Cek Inventori Masuk</h1>
            </div>
            <div class="px-5">
                <form action="purchasing/terima" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="user" id="user" value="{{ session('user')['id'] }}">
                    <div class="form-group">
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="namaBarang">Kode Transaksi</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7">
                                <select class="form-control" name="id" id="id">
                                    <option value="">Kode Transaksi</option>
                                    @foreach($purchasings as $purchasing)
                                    <option value="{{ $purchasing['id'] }}">{{ $purchasing['id'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="namaBarang">Nama Barang</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7">
                                <input type="text" id="namaBarang" disabled class="form-control">
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
                                <input type="text" id="kodeBarang" disabled class="form-control">
                                <input type="hidden" name="inventoryCode" id="inventoryCode" class="form-control">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="kategori">Kategori Barang</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-7">
                                <input type="text" id="kategori" disabled class="form-control">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="jumlah">Jumlah</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-2">
                                <input type="text" name="qtyPurchased" id="qtyPurchased" class="form-control">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="supplier">Supplier</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-4">
                                <input type="text" name="supplierID" id="supplierID" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="tanggal">Tanggal</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-4">
                                <input type="text" disabled name="orderDate" id="orderDate" class="form-control">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="status">Status</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-4">
                                <input type="text" disabled name="status" id="status" class="form-control">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2">
                                <label class="h5" for="editor">Last Edited</label>
                            </div>
                            <div class="col-1">
                                <h5>:</h5>
                            </div>
                            <div class="col-4">
                                <h5 id="editor"></h5>
                                <input type="hidden" name="updatedBy" id="updatedBy" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-around pt-4">
                                <input type="submit" name="button" class="btn btn-info btn-lg" value="Terima">
                                <input onclick="return confirm('Anda Yakin Batalkan Transaksi?')" type="submit" name="button" class="btn btn-danger btn-lg" value="Cancel">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
        </div>
    </div>
</div>

@endsection

@section('custom-js')
<script>
    $(document).ready(function() {
        $('#id').change(function(){
            var id = $(this).val();
            $.ajax({
                url : "getPemasukan/" + id,
                method : "GET",
                data : {
                    id : id,
                },
                success : function(result){
                    $("#namaBarang").val(result.namaBarang);
                    $('#kodeBarang').val(result.kodeBarang);
                    $('#inventoryCode').val(result.kodeBarang);
                    $('#kategori').val(result.kategori);
                    $('#supplierID').val(result.supplier);
                    $('#qtyPurchased').val(result.jumlah);
                    $('#orderDate').val(result.tanggal);
                    if(result.status == 'arrived'){
                        var statusNote = 'dikirim';
                    }else if(result.status == 'recieved'){
                        var statusNote = 'diterima';
                    }else if(result.status == 'paid'){
                        var statusNote = 'terbayar';
                    }else{
                        var statusNote = 'dibatalkan';
                    }
                    $('#status').val(statusNote);
                    $('#editor').text(result.editor);
                }
            });
        });
        $('#qtyPurchased').keyup(function(){
            var harga = $('#harga').val();
            var stock = $('#qtyPurchased').val();
            if(stock != ""){
                var price = harga * stock;
                $('#price').val(price);
            }else if(stock == "" || stock == 0){
                $('#price').val('');
            }
        })
        @if(session('status') == 'success')
        $(document).ready(function() {
                Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: "Barang Sudah diterima!",
                showCloseButton : true
            });
        });
        @elseif(session('status') == 'failed')
        $(document).ready(function() {
                Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "Terima barang Gagal, Isi Data Dengan Benar!",    
                showCloseButton : true
            });
        });
        @elseif(session('status') == 'cancel')
        $(document).ready(function() {
                Swal.fire({
                icon: 'error',
                title: 'Batal',
                text: "Transaksi berhasil dibatalkan!",    
                showCloseButton : true
            });
        });
        @endif
	    $('#table').DataTable();
	    $('#table1').DataTable();
    });
    
    
</script>
@endsection