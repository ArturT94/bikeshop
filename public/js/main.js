/*Cart*/
$('body').on('click', '.add-to-cart-link', function (e) {
    e.preventDefault();
    let id = $(this).data('id'),
        qty = $('.quantity').val() ? $('.quantity').val() : 1,
        mod_id = $('.available select').val() ? $('.available select').val() : null,
        jsonCode = {id: id, qty: qty, mod_id: mod_id};
    $.ajax({
        url: 'cart/add',
        data: jsonCode,
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Что-то пошло не так попробуйте перезагрузить страницу');
        }
    });
});

$('#card .modal-body').on('click', '.del-item', function () {
    let id = $(this).data('id');
    $.ajax({
        url: '/cart/delete',
        data: {'id':id},
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Произошла ошибка, попробуйте позже.');
        }
    });
});

function showCart(cart){
    $('#card .modal-dialog .modal-content .modal-body').html(cart);
    $('#card').modal();
    if($('#changeCartPrice').text()){
        $('.simpleCart_total').text($('#changeCartPrice').text());
    }else{
        $('.simpleCart_total').text('Корзина пуста');
    }
}

function getCart(){
    $.ajax({
        url: 'cart/show',
        type: 'GET',
        success: function(res) {
            showCart(res);
        },
        error: function() {
            alert("Ошибка! Попробуйте позже");
        }
    });
}
/*Cart*/

$('#currency').change(function() {
window.location = 'currency/change?curr=' + $(this).val();
});

$('.available select').on('change', function () {
    let ModeId = $(this).val(),
        color = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price'),
        basePrice = $('#base-price').data('base'),
        baseOldPrice = $('#base-price').data('old');
        if(price){
            $('#base-price').text(simboleLeft+price+simboleRight);
        }else {
            $('#base-price').html(simboleLeft+basePrice+simboleRight+" <small><del>"+simboleLeft+baseOldPrice+simboleRight+"</del>");
        }
});