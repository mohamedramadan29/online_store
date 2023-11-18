<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use function PHPUnit\Framework\exactly;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allcategory = Category::all();
        $data['route'] ='categories';
       return view('admin.Category.index',$data,compact("allcategory"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['route'] ='categories';
        return view('admin.Category.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            //$validate = $request->validated();
            $validator = Validator::make($request->all(), [
                'name_ar'=>'required',
                'name_en'=>'required',
                'description_ar'=>'required',
                'description_en'=>'required',
                'image'=>'required|image',
                'meta_title_ar' => 'required',
                'meta_title_en' => 'required',
                'meta_description_ar' => 'required',
                'meta_description_en' => 'required',
                'meta_keywords' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $category = new Category();
            if($request->hasFile('image')){
                $imagae = $request->file('image')->store('public/assets/uploads/category');
            }
            $category->name = ['ar'=>$request->name_ar,'en'=>$request->name_en];
            $category->description = ['ar'=>$request->description_ar,'en'=>$request->description_en];
            $category->meta_title=['ar'=>$request->meta_title_ar,'en'=>$request->meta_title_en];
            $category->meta_description=['ar'=>$request->meta_description_ar,'en'=>$request->meta_description_en];
            $category->slug = Str::slug($category->name);
            $category->is_showing = $request->is_showing ? '1' : '0';
            $category->is_popular = $request->is_popular ? '1' : '0';
            $category->meta_keywords = $request->meta_keywords;
            $category->image = $imagae;
            $category->save();
            toastr()->success(trans('messages.success'), 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('categories.index');

        }catch (\Exception $e){
            return redirect()->back()->withErrors('error',$e->getMessage());
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
        $data['route'] ='categories';
        $category = Category::findorFail($id);
        return view('admin.Category.edit',$data,compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name_ar'=>'required',
                'name_en'=>'required',
                'description_ar'=>'required',
                'description_en'=>'required',
                'meta_title_ar' => 'required',
                'meta_title_en' => 'required',
                'meta_description_ar' => 'required',
                'meta_description_en' => 'required',
                'meta_keywords' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $category = Category::findOrFail($id);
            $image = $category->image;
            if($request->hasFile('image')){
                Storage::delete($image);
                $image = $request->file('image')->store('public/assets/uploads/category');
            }
            $category->update([
            "name" => ['ar'=>$request->name_ar,'en'=>$request->name_en],
            "description" => ['ar'=>$request->description_ar,'en'=>$request->description_en],
            "meta_title"=>['ar'=>$request->meta_title_ar,'en'=>$request->meta_title_en],
            "meta_description"=>['ar'=>$request->meta_description_ar,'en'=>$request->meta_description_en],
            "slug" => Str::slug($category->name),
            "is_showing" => $request->is_showing ? '1' : '0',
            "is_popular" => $request->is_popular ? '1' : '0',
            "meta_keywords" => $request->meta_keywords,
            "image" => $image,
            ]);
            toastr()->success(trans('messages.update'), 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('categories.edit',$category);
        }catch (\Exception $e){
            return redirect()->back()->withErrors('error',$e->getMessage());

    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        Storage::delete($category->image);
        $category->delete();
        toastr()->success(trans('messages.delete'), 'Congrats', ['timeOut' => 5000]);
        return redirect()->route('categories.index');
    }
}
