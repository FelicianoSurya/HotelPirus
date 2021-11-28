<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function viewIndex(){
        $suppliers = Supplier::with(['createdBy','updatedBy'])->get();
        return view('page/supplier/supplier',[
            'suppliers' => $suppliers
        ]);
    }

    public function editView($id){
        $supplier = Supplier::find($id);

        return view('page/supplier/editSupplier',[
            'supplier' => $supplier
        ]);
    }

    public function addSupplier(Request $request){
        $validate = Validator::make($request->all(),[
            'supplierCode' => 'required',
            'supplierName' => 'required',
            'address' => 'required',
            'phoneNumber' => 'required'
        ]);

        if($validate->fails()){
            $request->session()->flash('status','failed');
            $request->session()->flash('msg',[
                'supplierCode' => $request->supplierCode,
                'supplierName' => $request->supplierName,
                'address' => $request->address,
                'phoneNumber' => $request->phoneNumber,
            ]);
            return back()->withErrors($validate);
        }

        Supplier::create([
            'supplierCode' => $request->supplierCode,
            'supplierName' => $request->supplierName,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'createdBy' => $request->user,
            'updatedBy' => $request->user
        ]);
        $request->session()->flash('status','success');

        return back();
    }
    
    public function editSupplier(Request $request){
        $validate = Validator::make($request->all(),[
            'address' => 'required',
            'phoneNumber' => 'required'
        ]);

        if($validate->fails()){
            $request->session()->flash('status','failed');
            return back();
        }

        $id = $request->id;

        $supplier = Supplier::find($id);

        $supplier->fill([
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'updatedBy' => $request->user
        ]);

        $supplier->save();
        $request->session()->flash('status','success');

        return back();
    }

    public function deleteSupplier(Request $request, $id){
        Supplier::find($id)->delete();

        $request->session()->flash('msg','success');
        return back();
    }
}
