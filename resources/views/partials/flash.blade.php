@if (session('message'))
    <div dir="rtl" class="alert alert-{{session('status') ?? 'success'}} alert-dismissible fade show animated flash" role="alert">
        {{session('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
