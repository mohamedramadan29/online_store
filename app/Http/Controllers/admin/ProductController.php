<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mockery\Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['route'] = 'products';
        $data['allproducts'] = Product::all();
        return view('admin.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['route'] = 'products';
        $data['categories'] = Category::select('id', 'name')->get();
        return view('admin.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image')->store('public/assets/uploads/products');
            }
            $product = new Product();
            $product->category_id = $request->category_id;
            $product->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
            $product->slug = Str::slug($product->name);
            $product->short_description = ['ar' => $request->short_description_ar, 'en' => $request->short_description_en];
            $product->description = ['ar' => $request->description_ar, 'en' => $request->description_en];
            $product->price = $request->price;
            $product->selling_price = $request->selling_price;
            $product->qty = $request->qty;
            $product->tax = $request->tax;
            $product->status = $request->status ? '1' : '0';
            $product->trend = $request->trend ? '1' : "0";
            $product->meta_title = ['ar' => $request->meta_title_ar, 'en' => $request->meta_title_en];
            $product->meta_description = ['ar' => $request->meta_description_ar, 'en' => $request->meta_description_en];
            $product->meta_title = ['ar' => $request->meta_title_ar, 'en' => $request->meta_title_en];
            $product->meta_keywords = $request->meta_keywords;
            $product->image = $image;
            $product->save();
            toastr()->success(trans('messages.success'), 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $data['route'] = 'products';
        $data['categories']=Category::select('id','name')->get();
        return view('admin.products.edit',$data,compact('product'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        try {
            $image = $product->image;
            if($request->hasFile('image')){
                // delete old image
                Storage::delete($image);
                // store new image
                $image = $request->file('image')->store('public/assets/uploads/products');
            }
            $product->update([
            "category_id" => $request->category_id,
            "name" => ['ar' => $request->name_ar, 'en' => $request->name_en],
            "slug" => Str::slug($product->name),
            "short_description" => ['ar' => $request->short_description_ar, 'en' => $request->short_description_en],
            "description" => ['ar' => $request->description_ar, 'en' => $request->description_en],
            "price" => $request->price,
            "selling_price" => $request->selling_price,
            "qty" => $request->qty,
            "tax" => $request->tax,
            "status" => $request->status ? '1' : '0',
            "trend" => $request->trend ? '1' : "0",
            "meta_title" => ['ar' => $request->meta_title_ar, 'en' => $request->meta_title_en],
            "meta_description" => ['ar' => $request->meta_description_ar, 'en' => $request->meta_description_en],
            "meta_title" => ['ar' => $request->meta_title_ar, 'en' => $request->meta_title_en],
            "meta_keywords" => $request->meta_keywords,
            "image" => $image,
            ]);
            toastr()->success(trans('messages.success'), 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('products.edit',$id);


        }catch (Exception $e){
            return redirect()->back()->withErrors('error',$e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();
        toastr()->success(trans('messages.delete'), 'Congrats', ['timeOut' => 5000]);
        return redirect()->route('products.index');
    }
}
