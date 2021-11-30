<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Validator;
use App\Models\Inventory;
use App\Models\Supplier;
use App\Models\Purchasing;

use Illuminate\Http\Response;

class InventoryController extends Controller
{
    public function viewIndex(){
        $params = Inventory::with(['createdBy','updatedBy'])->get();
        return view('page/inventory/inventory',[
            'inventories' => $params,
        ]);
    }

    public function editView($id){
        $inventory = Inventory::find($id);

        return view('page/inventory/editInventory',[
            'inventory' => $inventory
        ]);
    }

    public function addInventory(Request $request){
        $validate = Validator::make($request->all(),[
            'inventoryCode' => 'required',
            'inventoryName' => 'required',
            'stock' => 'integer|min:0'
        ]);

        if($validate->fails()){
            $request->session()->flash('status','failed');
            $request->session()->flash('msg',[
                'inventoryCode' => $request->inventoryCode,
                'inventoryName' => $request->inventoryName,
                'stock' => $request->stock
            ]);
            return back()->withErrors($validate);
        }

        Inventory::create([
            'inventoryCode' => $request->inventoryCode,
            'inventoryName' => $request->inventoryName,
            'stock' => $request->stock,
            'createdBy' => $request->user,
            'updatedBy' => $request->user
        ]);
        $request->session()->flash('status','success');

        return back();
    }
    
    public function editInventory(Request $request){
        $validate = Validator::make($request->all(),[
            'stock' => 'required|integer|min:0'
        ]);

        if($validate->fails()){
            $request->session()->flash('status','failed');
            return back();
        }

        $id = $request->id;

        $inventory = Inventory::find($id);

        $inventory->fill([
            'stock' => $request->stock,
            'updatedBy' => $request->user
        ]);

        $inventory->save();
        $request->session()->flash('status','success');

        return back();
    }

    public function viewPemasukan(){
        $purchasings = Purchasing::where('status', 'arrived')->get();

        return view('page/inventory/inventoryMasuk',[
            'purchasings' => $purchasings
        ]);
    }

    public function getDetailTransaksi($id){
        $params = Purchasing::with(['createdBy','updatedBy','supplier','inventory'])->where('id',$id)->first();

        $data = [
            'namaBarang' => $params->inventory->inventoryName,
            'kodeBarang' => $params->inventory->inventoryCode,
            'supplier' => $params->supplier->supplierName,
            'tanggal' => $params->orderDate,
            'jumlah' => $params->qtyPurchased,
            'status' => $params->status,
            'editor' => $params->updatedby->name
        ];

        return response()->json($data);

    }

    public function processTerima(Request $request){
        $id = $request->id;
        
        $validate = Validator::make($request->all(),[
            'qtyPurchased' => 'required|integer|min:0|not_in:0'
        ]);

        if($validate->fails()){
            $request->session()->flash('status','failed');
            return back();
        }

        $purchasing = Purchasing::find($id);
        $inventoryCode = $request->inventoryCode;
        $price = $purchasing->price;

        $inventory = Inventory::where('inventoryCode' , $inventoryCode)->first();
        $stock = $inventory->stock;
        $total = $stock + $request->qtyPurchased;
        if($request->button == 'Terima'){
            $purchasing->fill([
                'qtyPurchased' => $request->qtyPurchased,
                'updatedBy' => $request->user,
                'grand' => $price * $request->qtyPurchased,
                'status' => 'recieved'
            ]);

            $inventory->fill([
                'stock' => $total,
                'udpatedBy' => $request->user
            ]);

            $purchasing->save();
            $inventory->save();
            $request->session()->flash('status','success');
        }else{
            $purchasing->fill([
                'updatedBy' => $request->user,
                'status' => 'cancel'
            ]);

            $purchasing->save();
            $request->session()->flash('status','cancel');
        }

        return back();
    }

}
