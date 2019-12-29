<div class="col-md-1 mr-auto align-self-center">
    <i class="fa fa-3x fa-trash text-danger pointer remove-clone-row @if($hidden) hidden @endif"
        onclick="$(this).parents('.to-be-cloned').remove();if($('.remove-clone-row').length < 2) $('.remove-clone-row').hide()"
    ></i>
</div>
