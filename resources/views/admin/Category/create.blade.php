<!-- Content Wrapper. Contains page content -->
@if(Auth::user()->is_admin != 1)
    {{abort(403)}}
@endif
@extends('admin.master');
@section('title')
    {{trans('page_title.add_category_title')}}
@endsection
@section('page_title')
    {{trans('page_title.add_category_title')}}
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
        <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name"> {{trans('category.name')}}  </label>
                            <input value="{{old('name_ar')}}" type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror" id="name">
                        </div>
                        @error('name_ar')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="name"> {{trans('category.description')}}   </label>
                            <textarea class="form-control @error('description_ar') is-invalid @enderror" name="description_ar">{{old('description_ar')}}</textarea>
                        </div>
                        @error('description_ar')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="meta_title"> {{trans('category.meta_title')}}    </label>
                            <input value="{{old('meta_title_ar')}}" type="text" name="meta_title_ar" class="form-control @error('meta_title_ar') is-invalid @enderror" id="meta_title">
                        </div>
                        @error('meta_title_ar')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="meta_description">  {{trans('category.meta_description')}}   </label>
                            <textarea class="form-control @error('meta_description_ar') is-invalid @enderror" name="meta_description_ar">{{old('meta_description_ar')}}</textarea>
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
                        </div>
                        @error('image')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-check">
                            <input  type="checkbox" name="is_showing" class="form-check-input @error('is_showing') is-invalid @enderror" id="is_showing">
                            <label class="form-check-label" for="is_showing"> {{trans('category.status')}}   </label>
                        </div>
                        @error('is_showing')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name_en">  {{trans('category.name_en')}}  </label>
                            <input value="{{old('name_en')}}" type="text" name="name_en" class="form-control @error('name_en') is-invalid @enderror" id="name_en">
                        </div>
                         @error('name_en')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="name"> {{trans('category.description_en')}} </label>
                            <textarea class="form-control @error('description_en') is-invalid @enderror" name="description_en">{{old('description_en')}}</textarea>
                        </div>
                         @error('description_en')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="meta_title_en"> {{trans('category.meta_title_en')}}  </label>
                            <input value="{{old('meta_title_en')}}" type="text" name="meta_title_en" class="form-control @error('meta_title_en') is-invalid @enderror" id="meta_title_en">
                        </div>
                         @error('meta_title_en')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="meta_description_en"> {{trans('category.meta_description_en')}} </label>
                            <textarea class="form-control @error('meta_description_en') is-invalid @enderror" name="meta_description_en">{{old('meta_description_en')}}</textarea>
                        </div>
                         @error('meta_description_en')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-group">
                            <label for="meta_keywords"> {{trans('category.keywords')}} <span class="badge badge-danger">{{trans('category.keywords_title')}} </span>  </label>
                            <input value="{{old('meta_keywords')}}" type="text" name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords">
                        </div>
                         @error('meta_keywords')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
                        <div class="form-check">
                            <input type="checkbox" name="is_popular" class="form-check-input @error('is_popular') is-invalid @enderror" id="is_popular">
                            <label class="form-check-label" for="is_popular">  {{trans('category.popular')}} </label>
                        </div>
                         @error('is_popular')
                        <div class="alert alert-dismissible alert-danger"> {{$message}} </div>
                        @enderror
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
