<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }
    public function add()
    {
        return view('admin.product.add');
    }
    public function insert(Request $request)
    {
            // $product = new Product();       
            // $product->name = $request->input('name');
            // $product->price = $request->input('price');
            // $product->stock = $request->input('stock');        
            // $product->save();
            $validatedData = $request->validate([
                'name' => 'required',           
                'price' => 'required',
                'stock' => 'required',
                        
            ], [
                'name.required' => 'Name field is required.',            
                'price.required' => 'Price field is required.',
                'stock.required' => 'Stock field is required.',
                // 'email.email' => 'Email field must be email address.',            
            ]);
      
            
            $user = Product::create($validatedData);
           return redirect('/home')->with('status','Product Added Successfully');

    }
    public function edit($id)
    {
        $products =Product::find($id);
        return view('admin.product.edit',compact('products'));
    }
    public function update(Request $request ,$id)
    {
        $product = Product::find($id);
       
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->update();
        return redirect('/home')->with('status','Product Updated Successfully');
    }

    public function destroy($id)
          {
               $product =Product::find($id);              
               $product->delete();
               return redirect('/product')->with('status','Product Deleted Successfully');
            }
  
}
