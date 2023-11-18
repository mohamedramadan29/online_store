@extends('website.layouts.master')

@section('title')
    منتجات القسم
@endsection
@section('contetn')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
            </ol>
        </nav>
    </div>

    <div class="category_products">
        <div class="container">
            <div class="data">
                <div class="row">

                    @foreach($category->products as $product)
                        {{--   products [is the relationship name]--}}
                        <div class="col-lg-3">
                            <a href="{{route('product_details',$product->slug)}}">
                            <div class="card item m-2" style="width: 18rem;">
                                <img src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}"
                                     style="max-width: 100%; height: 250px" class="img-thumbnail img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <p class="card-text"> {{$product->short_description}} </p>
                                    <p class="d-inline-block"> {{$product->selling_price}} </p> @if(!empty($product->selling_price))
                                        <p class="text-decoration-line-through d-inline-block"> {{$product->price}} </p>
                                    @else
                                        <p class="d-inline-block"> {{$product->price}} </p>
                                    @endif
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
