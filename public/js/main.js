$('#currency').change(function() {
    console.log($(this).val());
window.location = 'currency/change?curr=' + $(this).val();
});

$('.available select').on('change', function () {
    let ModeId = $(this).val();
        color = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price');
        basePrice = $('#base-price').data('base');
        if(price){
            $('#base-price').text(simboleLeft+price+simboleRight);
        }else {
            $('#base-price').text(simboleLeft+basePrice+simboleRight);
        }
    console.log(ModeId, color, price);
});