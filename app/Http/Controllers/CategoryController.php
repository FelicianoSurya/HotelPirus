<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Validator;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function view(){
        $params = Categories::all();
        return view('page/category/category',[
            'categories' => $params,
        ]);
    }

    public function editView($id){
        $category = Categories::find($id);

        return view('page/category/editCategory',[
            'category' => $category
        ]);
    }

    public function addCategory(Request $request){
        $validate = Validator::make($request->all(),[
            'categoryCode' => 'required',
            'categoryName' => 'required',
        ]);

        if($validate->fails()){
            $request->session()->flash('status','failed');
            $request->session()->flash('msg',[
                'categoryCode' => $request->categoryCode,
                'categoryName' => $request->categoryName,
            ]);
            return back()->withErrors($validate);
        }

        Categories::create([
            'categoryCode' => $request->categoryCode,
            'categoryName' => $request->categoryName,
            'createdBy' => $request->user,
            'updatedBy' => $request->user
        ]);
        $request->session()->flash('status','success');

        return back();
    }

    public function editCategory(Request $request){
        $validate = Validator::make($request->all(),[
            'categoryName' => 'required'
        ]);

        if($validate->fails()){
            $request->session()->flash('status','failed');
            return back();
        }

        $id = $request->id;

        $category = Categories::find($id);

        $category->fill([
            'categoryName' => $request->categoryName,
            'updatedBy' => $request->user
        ]);

        $category->save();
        $request->session()->flash('status','success');

        return back();
    }
}
