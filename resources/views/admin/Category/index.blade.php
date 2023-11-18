<!-- Content Wrapper. Contains page content -->
@if(Auth::user()->is_admin != 1)
    {{abort(403)}}
@endif
@extends('admin.master');
@section('title')
    {{trans('page_title.category_page_title')}}
@endsection
@section('page_title')
    {{trans('page_title.category_page_title')}}
@endsection
@section('css')
@stop
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('categories.create')}}" class="btn btn-primary btn-sm"> {{trans('category.add_new_category')}} <i class="fa fa-plus"></i> </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>

                                <tr>
                                    <th> # </th>
                                    <th> {{trans('category.name')}}  </th>
                                    <th> {{trans('category.image')}}  </th>
                                    <th> {{trans('category.status')}}  </th>
                                    <th> {{trans('category.popular')}}   </th>
                                    <th> {{trans('buttons.actions')}}  </th>
                                </tr>

                                </thead>
                              <tbody>
                              @php $i = 1; @endphp
                              @foreach($allcategory as $category)
                              <tr>
                                  <th> {{$i++}} </th>
                                  <th> {{$category->name}} </th>
                                  <th><img class="product-image-thumb" width="80px" height="80px" src="{{Storage::url($category->image)}}" alt=""> </th>
                                  <th>
                                  @if($category->is_showing)
                                      <span class="badge badge-success"> {{trans('category.showing')}} </span>
                                      @else
                                          <span class="badge badge-danger"> {{trans('category.hidden')}} </span>
                                  @endif
                                  </th>
                                  <th>
                                      @if($category->is_popular)
                                          <span class="badge badge-success"> {{trans('category.popular')}} </span>
                                      @else
                                          <span class="badge badge-danger"> {{trans('category.default')}} </span>
                                      @endif
                                  </th>
                                  <th>

                                      <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i> </a>
                                      @include('admin.includes.delete',['type'=>'category','data'=>$category,'route'=>"categories.destroy"])
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
@endsection

@section('js')
    <script src={{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}></script>
    <script src={{asset("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}></script>
    <script src={{asset("assets/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}></script>
    <script src={{asset("assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}></script>
    <script src={{asset("assets/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}></script>
    <script src={{asset("assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}></script>
    <script src={{asset("assets/plugins/jszip/jszip.min.js")}}></script>
    <script src={{asset("assets/plugins/pdfmake/pdfmake.min.js")}}></script>
    <script src={{asset("assets/plugins/pdfmake/vfs_fonts.js")}}></script>
    <script src={{asset("assets/plugins/datatables-buttons/js/buttons.html5.min.js")}}></script>
    <script src={{asset("assets/plugins/datatables-buttons/js/buttons.print.min.js")}}></script>
    <script src={{asset("assets/plugins/datatables-buttons/js/buttons.colVis.min.js")}}></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": false});
        });
    </script>
@stop
<!-- /.content-wrapper -->


