<!-- Set up your HTML -->
<div class="trend_category">
    <div class="container">
        <div class="data">
            <h2> Product Trend </h2>
            <div class="owl-carousel owl-theme">
                @foreach($products as $product)
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

                @endforeach
            </div>
        </div>
    </div>
</div>
@section('js')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            rtl: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>

@endsection
