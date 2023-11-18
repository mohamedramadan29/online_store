<!-- Set up your HTML -->
<div class="trend_category">
    <div class="container">
        <div class="data">
            <h2> Category Trend </h2>
            <div class="owl-carousel owl-theme">
                @foreach($categories as $category)
                    <a href="{{route('category_slug',$category->slug)}}">
                        <div class="card item m-2" style="width: 18rem;">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($category->image)}}" style="max-width: 100%; height: 250px" class="img-thumbnail img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$category->name}}</h5>
                                <p class="card-text"> {{$category->short_description}} </p>

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
            rtl:true,
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
