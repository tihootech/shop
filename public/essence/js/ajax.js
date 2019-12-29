$(document).on('click', 'button[name=addtocart]', function () {
    var method = 'add_to_cart';
    var target = $('#right-side-cart-area');
    var formData = {id:$(this).val()};
    sendAjax(method,formData,target);
    var count = parseInt($('#header-basket-count').text());
    $('#header-basket-count').text(count+1);
    $('#product-added').show();
    $(this).attr('disabled','disabled');
})

$(document).on('click', 'span.product-remove', function () {
    var method = 'remove_from_cart';
    var target = $('#right-side-cart-area');
    var formData = {id:$(this).attr('data-id')};
    sendAjax(method,formData,target);
    var count = parseInt($('#header-basket-count').text());
    $('#header-basket-count').text(count-1);
})

$(document).on('click', '.change-count', function () {
    var type = $(this).attr('name');
    var method = 'change_cart_count';
    var target = $('#right-side-cart-area');
    var formData = {id:$(this).val(),type:type};
    sendAjax(method,formData,target);
    var count = parseInt($('#header-basket-count').text());
    if (type == 'more') {
        $('#header-basket-count').text(count+1);
    }else {
        $('#header-basket-count').text(count-1);
    }
})


function sendAjax(method,formData,target){

    var token = $('meta[name="csrf-token"]').attr('content');
    formData._token = token;

    var url = documentRoot+'/ajax/'+method;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    })
    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function(data) {
            if(target && data){
                target.html(data);
            }
        }
    });
}
