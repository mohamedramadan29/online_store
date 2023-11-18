@extends('website.layouts.master')
@section('title')
    الاقسام
@endsection
@section('contetn')
    <div class="categories">
        <div class="container">
            <div class="data">
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-lg-3">
                            <a href="{{route('category_slug',$category->slug)}}">
                                <div class="card item m-2" style="width: 18rem;">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($category->image)}}"
                                         style="max-width: 100%; height: 250px" class="img-thumbnail img-fluid"
                                         alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$category->name}}</h5>
                                        <p class="card-text"> {{$category->short_description}} </p>
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
