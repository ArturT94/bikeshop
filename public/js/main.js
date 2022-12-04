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
            console.log(res);
        },
        error: function () {
            alert('Что-то пошло не так попробуйте перезагрузить страницу');
        }
    });
})
/*Cart*/

$('#currency').change(function() {
window.location = 'currency/change?curr=' + $(this).val();
});

$('.available select').on('change', function () {
    let ModeId = $(this).val(),
        color = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price'),
        basePrice = $('#base-price').data('base');
        if(price){
            $('#base-price').text(simboleLeft+price+simboleRight);
        }else {
            $('#base-price').text(simboleLeft+basePrice+simboleRight);
        }
});