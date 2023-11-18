<!-- Content Wrapper. Contains page content -->
@if(Auth::user()->is_admin != 1)
    {{abort(403)}}
@endif
@extends('admin.master');
@section('title')
    {{trans('page_title.edit_page_title')}}
@endsection
@section('page_title')
    {{trans('page_title.edit_page_title')}}
@endsection
@section('css')
@stop
@section('content')
    <!-- Content Header (Page header) -->
    <!-- general form elements -->
    <div class="card card-primary">
        @foreach ($errors->all() as $message) {
        {{$message}}
        }
        @endforeach
        <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name"> {{trans('category.name')}}  </label>
                            <input value="{{$product->getTranslation('name','ar')}}" type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror" id="name">
                        </div>
                        @error('name_ar')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="category_id"> {{trans('products.Select_category')}}  </label>
                            <select name="category_id" class="select2 form-control @error('category_id') is-invalid @enderror " id="">
                                <option value=""> {{trans('products.Select_category')}} </option>
                                @foreach($categories as $category)
                                    <option @if($category->id == $product->category_id) selected @endif value="{{$category->id}}"> {{$category->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                        <div class="alert alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="name"> {{trans('products.price')}}  </label>
                            <input value="{{$product->price}}" type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="price">
                        </div>
                        @error('price')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="name"> {{trans('products.qty')}}  </label>
                            <input value="{{$product->qty}}" type="number" name="qty" class="form-control" id="qty">
                        </div>
                        <div class="form-group">
                            <label for="name"> {{trans('products.short_description_ar')}}   </label>
                            <textarea class="form-control @error('short_description_ar') is-invalid @enderror" name="short_description_ar">{{$product->getTranslation('short_description','ar')}}</textarea>
                        </div>
                        @error('short_description_ar')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="name"> {{trans('category.description')}}   </label>
                            <textarea class="form-control @error('description_ar') is-invalid @enderror" name="description_ar">{{$product->getTranslation('description','ar')}}</textarea>
                        </div>
                        @error('description_ar')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="meta_title"> {{trans('category.meta_title')}}    </label>
                            <input value="{{$product->getTranslation('meta_title','ar')}}" type="text" name="meta_title_ar" class="form-control @error('meta_title_ar') is-invalid @enderror" id="meta_title">
                        </div>
                        @error('meta_title_ar')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="meta_description">  {{trans('category.meta_description')}}   </label>
                            <textarea class="form-control @error('meta_description_ar') is-invalid @enderror" name="meta_description_ar">{{$product->getTranslation('meta_description','ar')}}</textarea>
                        </div>
                        @error('meta_description_ar')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="exampleInputFile">  {{trans('category.image')}}  </label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="exampleInputFile" name="image">
                                    <label class="custom-file-label " for="exampleInputFile">    {{trans('category.image')}} </label>
                                </div>
                            </div>
                            <img width="80px" class="img-thumbnail product-img" src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}" alt="">
                        </div>
                        @error('image')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-check">
                            <input @if($product->status ==1) checked @endif  type="checkbox" name="status" class="form-check-input @error('is_showing') is-invalid @enderror" id="is_showing">
                            <label class="form-check-label" for="status"> {{trans('category.status')}}   </label>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name_en">  {{trans('category.name_en')}}  </label>
                            <input value="{{$product->getTranslation('name','en')}}" type="text" name="name_en" class="form-control @error('name_en') is-invalid @enderror" id="name_en">
                        </div>
                        @error('name_en')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="sale_price"> {{trans('products.sale_price')}}  </label>
                            <input value="{{$product->sale_price}}" type="text" name="sale_price" class="form-control" id="sale_price">
                        </div>
                        <div class="form-group">
                            <label for="name"> {{trans('products.tax')}}  </label>
                            <input value="{{$product->tax}}" type="number" name="tax" class="form-control" id="tax">
                        </div>
                        <div class="form-group">
                            <label for="name"> {{trans('products.short_description_en')}}   </label>
                            <textarea class="form-control @error('short_description_en') is-invalid @enderror" name="short_description_en">{{$product->getTranslation('short_description','en')}}</textarea>
                        </div>
                        @error('short_description_en')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="name"> {{trans('category.description_en')}} </label>
                            <textarea class="form-control @error('description_en') is-invalid @enderror" name="description_en">{{$product->getTranslation('description','en')}}</textarea>
                        </div>
                        @error('description_en')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="meta_title_en"> {{trans('category.meta_title_en')}}  </label>
                            <input value="{{$product->getTranslation('meta_title','en')}}" type="text" name="meta_title_en" class="form-control @error('meta_title_en') is-invalid @enderror" id="meta_title_en">
                        </div>
                        @error('meta_title_en')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="meta_description_en"> {{trans('category.meta_description_en')}} </label>
                            <textarea class="form-control @error('meta_description_en') is-invalid @enderror" name="meta_description_en">{{$product->getTranslation('meta_description','en')}}</textarea>
                        </div>
                        @error('meta_description_en')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="meta_keywords"> {{trans('category.keywords')}} <span class="badge badge-danger">{{trans('category.keywords_title')}} </span>  </label>
                            <input value="{{$product->meta_keywords}}" type="text" name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords">
                        </div>
                        @error('meta_keywords')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-check">
                            <input @if($product->trend ==1) checked @endif type="checkbox" name="trend" class="form-check-input @error('trend') is-invalid @enderror" id="trend">
                            <label class="form-check-label" for="trend">  {{trans('category.popular')}} </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"> {{trans('buttons.save')}}  </button>
            </div>
        </form>
    </div>
    <!-- /.card -->
    <!-- /.content -->
@endsection

@section('js')
    <script src={{asset("assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js")}}></script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@stop
<!-- /.content-wrapper -->
