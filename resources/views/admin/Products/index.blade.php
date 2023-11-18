<!-- Content Wrapper. Contains page content -->
@if(Auth::user()->is_admin != 1)
    {{abort(403)}}
@endif
@extends('admin.master')
@section('title')
    {{trans('page_title.product_page_title')}}
@endsection
@section('page_title')
    {{trans('page_title.product_page_title')}}
@endsection
@section('css')
@stop
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('products.create')}}" class="btn btn-primary btn-sm"> {{trans('products.add_new_product')}} <i class="fa fa-plus"></i> </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th> # </th>
                                    <th> {{trans('category.name')}}  </th>
                                    <th> {{trans('products.category_name')}}  </th>
                                    <th> {{trans('products.price')}}  </th>
                                    <th> {{trans('category.image')}}  </th>
                                    <th> {{trans('category.status')}}  </th>
                                    <th> {{trans('category.popular')}}   </th>
                                    <th> {{trans('buttons.actions')}}  </th>
                                </tr>

                                </thead>
                                <tbody>
                                @php $i = 1; @endphp
                                @foreach($allproducts as $product)
                                    <tr>
                                        <th> {{$i++}} </th>
                                        <th> {{$product->name}} </th>
                                        <th> {{$product->category->name}} </th>
                                        <th> {{$product->price}} </th>
                                        <th><img class="product-image-thumb" width="80px" height="80px" src="{{Storage::url($product->image)}}" alt=""> </th>
                                        <th>
                                            @if($product->status)
                                                <span class="badge badge-success"> {{trans('category.showing')}} </span>
                                            @else
                                                <span class="badge badge-danger"> {{trans('category.hidden')}} </span>
                                            @endif
                                        </th>
                                        <th>
                                            @if($product->trend)
                                                <span class="badge badge-success"> {{trans('category.popular')}} </span>
                                            @else
                                                <span class="badge badge-danger"> {{trans('category.default')}} </span>
                                            @endif
                                        </th>
                                        <th>
                                            <a href="{{route('products.edit',$product->id)}}" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i> </a>
                                            @include('admin.includes.delete',['type'=>'product','data'=>$product,'route'=>"products.destroy"])
                                            {{--<a href="{{route('categories.destroy',$category->id)}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>--}}
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- /.content -->
@endsection

@section('js')
@stop
<!-- /.content-wrapper -->
