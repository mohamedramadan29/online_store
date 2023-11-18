<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        $data['route'] = 'index_page';
        $data['categories'] = Category::where('is_popular',1)->select('id','name','description','image','slug')->get();
        $data['products'] = Product::where('trend',1)->where('status',1)->select('name','category_id','description','price','selling_price','image','slug')->get();
        return view('website.index',$data);
    }
    public function all_categories(){
        $data['route']='categories_page';
        $data['categories'] = Category::where('is_showing',1)->get();
        return view('website.categories',$data);
    }
    public function category_slug($slug){
        $data['route'] = 'category_product_page';
        if(Category::where('slug',$slug)->exists()){
            $data['category'] = Category::with('products')->where('slug',$slug)->first();
           // $data['products'] = Product::where('category_id',$data['category']->id)->get();
            //return $data['category'];
            return view('website.category_product',$data);
        }else{
            return redirect('/')->with('error','there is wrong category');
        }
    }
    public function product_details($slug){
        $data['route']='product_details';
        if(Product::where('slug',$slug)->exists()){
            $data['product'] = Product::with('category')->where('slug',$slug)->first();
            $data['keywords'] = explode(',',$data['product']->meta_keywords);
            return view('website.product_details',$data);
        }else{
            return redirect('/')->with('error','This is not Products');
        }
    }
}
