@extends('website.layouts.master')

@section('title')
    {{$product->name}}
@endsection
@section('contetn')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
                <li class="breadcrumb-item"><a
                        href="{{route('category_slug',$product->category->slug)}}"> {{$product->category->name}} </a>
                </li>
                <li class="breadcrumb-item"> {{$product->name}} </li>
            </ol>
        </nav>
    </div>
    <div class="category_products">
        <div class="container">
            <div class="data">
                <input type="hidden" value="{{$product->qty}}" id="qty">
                {{--   products [is the relationship name]--}}
                <div class="card m-2">
                    <img src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}"
                         style="max-width: 100%; height: 250px" class="img-thumbnail img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <h6> {{$product->category->name}} </h6>
                        <p class="card-text"> {{$product->short_description}} </p>
                        <p class="d-inline-block"> {{$product->selling_price}} </p> @if(!empty($product->selling_price))
                            <p class="text-decoration-line-through d-inline-block"> {{$product->price}} </p>
                        @else
                            <p class="d-inline-block"> {{$product->price}} </p>
                        @endif

                        <p> <span class="badge badge-warning bg-warning">
                                @foreach($keywords as $keyword)
                                    {{$keyword}}
                                @endforeach
                            </span> </p>
                        <div class="input-group mb-3">
                            <button class="input-group-text btn btn-outline-warning" onclick="increaseqty()"> + </button>
                            <input type="number" min="1" class="form-control text-center" id="qty_value" value="1">
                            <button class="input-group-text btn btn-outline-warning" onclick="decreaseqty()"> - </button>
                        </div>
                        <div class="">
                            <button class="btn btn-primary btn-sm" onclick="addtocart()"> Add To Cart <i class="fa fa-cart-plus"></i> </button>
                        <input type="hidden" id="product_id" value="{{$product->id}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var qty = $("#qty").val();
        function increaseqty(){
            var value = parseInt($('#qty_value').val());
            value = isNaN(value) ? 0 : value;
            if(value < qty ){
                value ++
                $('#qty_value').val(value)
            }
        }
        function decreaseqty(){
            var value = parseInt($('#qty_value').val());
            value = isNaN(value) ? 0 : value;
            if(value > 1){
                value --
                $('#qty_value').val(value)
            }
        }
        function addtocart(){
            var product_id = $("#product_id").val();
            var qty = $('#qty_value').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
               method:'POST',
                url : '{{route('product.add_to_cart')}}',
                data:{
                   'product_id':product_id,
                    'qty':qty
                },
                success:function (res){
                    //console.log(res.msg);
                    swal(res.msg);
                }
            });
        }
    </script>
@endsection
