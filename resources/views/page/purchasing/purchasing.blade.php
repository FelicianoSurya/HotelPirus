@extends('template.app')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/purchasing.css') }}">
@endsection

@section('content')
@if(session('data'))
<div class="modal" style="background-color:rgba(0,0,0,0.5);" id="myModal" role="dialog">
    <div class="modal-dialog" style="width:100%;margin-top:50px">	
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" style="display:flex;justify-content:center; width:100%">Pembelian Sudah Dibuat</h4>
            </div>
            <div class="modal-body">
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="trans">Kode Transaksi</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-transaksi">{{ session('data')['id'] }}</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="namaBarang">Nama Barang</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-namaBarang">{{ session('data')['namaBarang'] }}</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="kodeBarang">kode Barang</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-kodeBarang">{{ session('data')['kodeBarang'] }}</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="harga">Harga Beli</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-harga">@currency(session('data')['harga'])</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="Jumlah">Jumlah</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-jumlah">{{ session('data')['jumlah'] }}</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="supplier">Supplier</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-supplier">{{ session('data')['supplier'] }}</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="total">Total Harga</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-total">@currency(session('data')['total'])</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="tanggal">Tanggal</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-tanggal">{{ session('data')['tanggal'] }}</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="status">Status</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-status">
                        @if(session('data')['stat'] == 'arrived')
                            dikirim
                        @elseif(session('data')['stat'] == 'paid')
                            terbayar
                        @elseif(session('data')['stat'] == 'recieved')
                            diterima
                        @elseif(session('data')['stat'] == 'cancel')
                            dibatalkan
                        @endif  
                        </h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="editor">Last Edited</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-editor">{{ session('data')['editor'] }}</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="created">Created By</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-creator">{{ session('data')['creator'] }}</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-12 d-flex justify-content-center">
                        <button class="btn btn-danger" class="close" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(session('paid'))
<div class="modal" style="background-color:rgba(0,0,0,0.5);" id="myModal1" role="dialog">
    <div class="modal-dialog" style="width:100%;margin-top:50px">	
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" style="display:flex;justify-content:center; width:100%">Notifikasi Pembayaran</h4>
            </div>
            <div class="modal-body">
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="trans">Kode Transaksi</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-transaksi">{{ session('paid')['id'] }}</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="namaBarang">Nama Barang</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-namaBarang">{{ session('paid')['namaBarang'] }}</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="kodeBarang">kode Barang</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-kodeBarang">{{ session('paid')['kodeBarang'] }}</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="harga">Harga Beli</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-harga">@currency(session('paid')['harga'])</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="Jumlah">Jumlah</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-jumlah">{{ session('paid')['jumlah'] }}</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="supplier">Supplier</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-supplier">{{ session('paid')['supplier'] }}</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="total">Total Harga</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-total">@currency(session('paid')['total'])</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="tanggal">Tanggal</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-tanggal">{{ session('paid')['tanggal'] }}</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="status">Status</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-status">
                        @if(session('paid')['stat'] == 'arrived')
                            dikirim
                        @elseif(session('paid')['stat'] == 'paid')
                            terbayar
                        @elseif(session('paid')['stat'] == 'recieved')
                            diterima
                        @elseif(session('paid')['stat'] == 'cancel')
                            dibatalkan
                        @endif    
                        </h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="editor">Last Edited</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-editor">{{ session('paid')['editor'] }}</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-4">
                        <label class="h7" for="created">Created By</label>
                    </div>
                    <div class="col-1">
                        <h7>:</h7>
                    </div>
                    <div class="col-4">
                        <h7 id="model-creator">{{ session('paid')['creator'] }}</h7>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-12 d-flex justify-content-center">
                        <button class="btn btn-danger" class="close" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="container-fluid body pt-5">
    <div class="row">
        <div class="col-12">
            <div class="container">
                <div class="pb-4 text-center">
                    <h1>Buat Pembelian</h1>
                </div>
                <div class="px-5">
                    <form action="purchasing/save" method="POST">
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
                                    <select class="form-control" name="inventoryID" id="inventoryID">
                                        <option value="">Nama Barang</option>
                                        @foreach($inventories as $inventory)
                                        <option value="{{ $inventory['id'] }}">{{ $inventory['inventoryName'] }}</option>
                                        @endforeach
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
                                    <input type="text" id="kodeBarang" disabled class="form-control">
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
                                    <input type="text" name="price" id="price" class="form-control">
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
                                    <select name="supplierID" id="supplierID" class="form-control">
                                        <option value="1">Nama Supplier</option>
                                        @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier['id'] }}">{{ $supplier['supplierName'] }}</option>
                                        @endforeach
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
                                <div class="col-4">
                                    <input type="date" name="orderDate" id="orderDate" class="form-control">
                                </div>
                            </div>
                            <div class="row pb-2">
                                <div class="col-2">
                                    <label class="h5" for="total">Total Harga</label>
                                </div>
                                <div class="col-1">
                                    <h5>:</h5>
                                </div>
                                <div class="col-4">
                                    <input type="text" name="grand" id="grand" class="form-control">
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
            </div>
            <hr>
            <div class="p-4 text-center">
                <h1>Bayar Pembelian</h1>
            </div>
            <table id="table" class="table table-bordered">
                <thead class="thead-dark">
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Beli</th>
                    <th>Supplier</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Created By</th>
                    <th>Updated By</th>
                    <th>Action</th>
                </thead>
                @foreach($purchasings as $data)
                <tr>
                    <td>{{ $data['inventory']['inventoryCode'] }}</td>
                    <td>{{ $data['inventory']['inventoryName'] }}</td>
                    <td>{{ $data['qtyPurchased'] }}</td>
                    <td>@currency($data['price'])</td>
                    <td>{{ $data['supplier']['supplierName'] }}</td>
                    <td>@currency($data['grand'])</td>
                    <td>{{ $data['orderDate'] }}</td>
                    <td>
                        @if($data['status'] == 'arrived')
                            dikirim
                        @elseif($data['status'] == 'paid')
                            terbayar
                        @elseif($data['status'] == 'recieved')
                            diterima
                        @elseif($data['status'] == 'cancel')
                            dibatalkan
                        @endif
                    </td>
                    <td>{{ $data['createdby']->name }}</td>
                    <td>{{ $data['updatedby']->name }}</td>
                    
                    <td>
                        <form action="purchasing/paid" method="POST">
                            {!! csrf_field() !!}
                            <input type="hidden" name="user" id="user" value="{{ session('user')['id'] }}">
                            <input type="hidden" name="id"  value="{{ $data['id'] }}">
                            <button type="submit" class="btn btn-sm btn-primary">Bayar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="p-4 text-center">
                <h1>History Pembelian</h1>
            </div>
            <table id="table1" class="table table-bordered">
                <thead class="thead-dark">
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Beli</th>
                    <th>Supplier</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Created By</th>
                    <th>Updated By</th>
                </thead>
                @foreach($histories as $data)
                <tr>
                    <td>{{ $data['inventory']['inventoryCode'] }}</td>
                    <td>{{ $data['inventory']['inventoryName'] }}</td>
                    <td>{{ $data['qtyPurchased'] }}</td>
                    <td>@currency($data['price'])</td>
                    <td>{{ $data['supplier']['supplierName'] }}</td>
                    <td>@currency($data['grand'])</td>
                    <td>{{ $data['orderDate'] }}</td>
                    <td>
                    @if($data['status'] == 'arrived')
                         dikirim
                    @elseif($data['status'] == 'paid')
                        terbayar
                    @elseif($data['status'] == 'recieved')
                        diterima
                    @elseif($data['status'] == 'cancel')
                        dibatalkan
                    @endif
                    </td>                    
                    <td>{{ $data['createdby']->name }}</td>
                    <td>{{ $data['updatedby']->name }}</td>
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
        $('#inventoryID').change(function(){
            var id = $(this).val();
            $.ajax({
                url : "getInventory/" + id,
                method : "GET",
                data : {
                    id : id,
                },
                success : function(result){
                    $('#kodeBarang').val(result.inventoryCode);
                }
            });
        });
        $('#qtyPurchased').keyup(function(){
            var harga = $('#price').val();
            var stock = $('#qtyPurchased').val();
            if(stock != ""){
                var grand = harga * stock;
                $('#grand').val(grand);
            }else if(stock == "" || stock == 0){
                $('#grand').val('');
            }
        })
        @if(session('data'))
        $(document).ready(function() {
            $('#myModal').modal({
            keyboard: false,
            show: true,
            backdrop: 'static'
        	});
        });
        @elseif(session('paid'))
        $(document).ready(function() {
            $('#myModal1').modal({
            keyboard: false,
            show: true,
            backdrop: 'static'
        	});
        });
        @elseif(session('status') == 'failed')
        $(document).ready(function() {
                Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "Pembelian Gagal, Isi Data Dengan Benar!",    
                showCloseButton : true
            });
        });
        @endif
	    $('#table').DataTable();
	    $('#table1').DataTable();
    });
    
    
</script>
@endsection