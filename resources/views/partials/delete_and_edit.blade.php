<a class="btn btn-sm btn-success m-1" title="ویرایش" data-toggle="tooltip" href="{{url("{$keyword}s/{$$keyword->id}/edit")}}">
    <i class="fa fa-edit ml-1"></i>
</a>
<a href="#" class="btn btn-sm btn-danger m-1 delete" title="حذف" data-toggle="tooltip" data-target="delete-{{$keyword}}-{{$$keyword->id}}">
    <i class="fa fa-trash ml-1"></i>
</a>
<form class="d-none" action="{{url("{$keyword}s/{$$keyword->id}")}}" method="post" id="delete-{{$keyword}}-{{$$keyword->id}}">
    @csrf
    {{ method_field('DELETE') }}
</form>
