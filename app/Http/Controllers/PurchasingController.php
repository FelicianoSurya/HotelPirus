<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchasing;
use App\Models\Inventory;
use App\Models\Supplier;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Blade;

class PurchasingController extends Controller
{
    public function viewIndex(){
        Blade::directive('currency', function ( $expression ) {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });
        $suppliers = Supplier::all();
        $inventories = Inventory::with(['Kategori'])->get();
        $params = Purchasing::with(['createdBy','updatedBy','supplier','inventory'])->where('status' , 'recieved')
                    ->get();
        $histories = Purchasing::with(['createdBy','updatedBy','supplier','inventory'])->where('status' , 'cancel')->orWhere('status','paid')
                    ->get();
        return view('page/purchasing/purchasing',[
            'purchasings' => $params,
            'histories' => $histories,
            'suppliers' => $suppliers,
            'inventories' => $inventories
        ]);
    }
    
    public function getInventory($id){

        $params = Inventory::with(['Kategori'])->where('id',$id)->first();
        $data = [
            'inventoryCode' => $params['inventoryCode'],
            'categoryName' => $params['Kategori']->categoryName
        ];

        return response()->json($data);
    }

    public function save(Request $request){
        $validate = Validator::make($request->all(),[
            'supplierID' => 'required',
            'inventoryID' => 'required',
            'qtyPurchased' => 'integer|min:0|not_in:0',
            'price' => 'integer|required|min:0|not_in:0',
            'orderDate' => 'required',
            'grand' => 'integer|required|min:0|not_in:0'
        ]);

        if($validate->fails()){
            $request->session()->flash('status','failed');
            return back();
        }

        Purchasing::create([
            'supplierID' => $request->supplierID,
            'inventoryID' => $request->inventoryID,
            'qtyPurchased' => $request->qtyPurchased,
            'orderDate' => $request->orderDate,
            'grand' => $request->grand,
            'price' => $request->price,
            'status' => 'arrived',
            'createdBy' => $request->user,
            'updatedBy' => $request->user
        ]);

        $detailData = Purchasing::with(['createdBy','updatedBy','supplier','inventory'])
        ->orderBy('id','DESC')->first();

        $request->session()->flash('data',[
            'status' => 'success',
            'id' => $detailData->id,
            'namaBarang' => $detailData->inventory->inventoryName,
            'kodeBarang' => $detailData->inventory->inventoryCode,
            'kategori' => $detailData->inventory->Kategori->categoryName,
            'harga' => $request->price,
            'jumlah' => $detailData->qtyPurchased,
            'supplier' => $detailData->supplier->supplierName,
            'total' => $detailData->grand,
            'tanggal' => $detailData->orderDate,
            'stat' => $detailData->status,
            'editor' => $detailData->updatedby->name,
            'creator' => $detailData->createdby->name 
        ]);
        
        return back();
    }

    public function paid(Request $request){
        $id = $request->id;
        $purchasing = Purchasing::find($id);

        $purchasing->fill([
            'status' => 'paid',
            'updatedBy' => $request->user,
        ]);
        
        $purchasing->save();

        $detailData = Purchasing::find($id);

        $request->session()->flash('paid',[
            'status' => 'success',
            'id' => $detailData->id,
            'namaBarang' => $detailData->inventory->inventoryName,
            'kodeBarang' => $detailData->inventory->inventoryCode,
            'kategori' => $detailData->inventory->Kategori->categoryName,
            'harga' => $detailData->price,
            'jumlah' => $detailData->qtyPurchased,
            'supplier' => $detailData->supplier->supplierName,
            'total' => $detailData->grand,
            'tanggal' => $detailData->orderDate,
            'stat' => $detailData->status,
            'editor' => $detailData->updatedby->name,
            'creator' => $detailData->createdby->name 
        ]);

        return back();
    }
}
