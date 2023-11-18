@extends('website.layouts.master')
@section('title')
    cart
@endsection
@section('contetn')
    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                    </div>
                    @php $total_price = 0; @endphp
                    @forelse ($items as $item)
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-lg-2">
                                        <img
                                            src="{{\Illuminate\Support\Facades\Storage::url($item->Product->image)}}"
                                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                                    </div>
                                    <div class="col-lg-2">
                                        <p class="lead fw-normal mb-2">{{$item->Product->name}}</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <button class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown();updatecart({{$item->id}});">
                                            <i class="fas fa-minus"></i>
                                        </button>

                                        <input id="form1" min="0" name="quantity" value="{{$item->qty}}" type="number"
                                               class="form-control form-control-sm qty_{{$item->id}}"/>

                                        <button class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp();updatecart({{$item->id}});">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col-lg-2">
                                        <h5 class="mb-0">$
                                            @if(!empty($item->Product->selling_price))
                                                @php  $product_price =  $item->Product->selling_price; @endphp
                                                {{$product_price}}
                                            @else
                                                @php $product_price = $item->Product->price; @endphp
                                                {{$product_price}}
                                            @endif
                                        </h5>
                                    </div>
                                    <div class="col-lg-2">
                                        <h5 class="mb-0">$
                                            @if(!empty($item->Product->selling_price))
                                                @php  $product_price =  $item->Product->selling_price; @endphp
                                                {{$product_price * $item->qty}}
                                            @else
                                                @php $product_price = $item->Product->price; @endphp
                                                {{$product_price * $item->qty}}
                                            @endif
                                        </h5>
                                    </div>
                                    <div class="col-lg-1 text-end">
                                        @include('admin.includes.delete',['type'=>'cart_item','data'=>$item,'route'=>"cart.destroy"])
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $total_price +=  $product_price * $item->qty; @endphp
                    @empty
                        <div class="alert alert-info"> No Product Found</div>
                    @endforelse
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="btn btn-warning btn-block btn-lg"> Total Price : {{$total_price}} $ </button>
                                <a href="{{route('checkout.index')}}" class="btn btn-warning btn-block btn-lg"> Proceed to Pay </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        function updatecart(id){
            var qty = $(".qty_"+id).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
               method: "POST",
               url: '{{route('cart.update')}}' ,
               // dataType:'json',
                data:{
                   id:id,
                    qty:qty,
                },
                success:function (response){
                    console.log(response.msg);
                }
            });
        }

    </script>
@endsection

