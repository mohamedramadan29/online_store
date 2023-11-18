<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#{{$type}}_{{$data->id}}">
    <i class="fa fa-trash"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="{{$type}}_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route($route,$data->id)}}">
                @csrf
                @method('DELETE')
            <div class="modal-body">
               <h5> {{trans('messages.sure_delete')}} </h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('buttons.close')}}</button>
                <button type="submit" class="btn btn-primary">{{trans('buttons.delete')}}</button>
            </div>
            </form>
        </div>
    </div>
</div>
