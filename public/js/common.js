function getItems() {
    $.ajax({
        type: 'GET',
        url: '/make_order/getItems',
        success: function (Response) {
            $('#itemDiv').html('');
            $('#itemDiv').append(Response);
        }
    });
}

function getSetMenu() {
    $.ajax({
        type: 'GET',
        url: '/make_order/getSetMenu',
        success: function (Response) {
            $('#itemDiv').html('');
            $('#itemDiv').append(Response);
        }
    });
}

function orderItem(itemID) {
    $.ajax({
        type: 'GET',
        url: '/make_order/itemList/' + itemID,
        success: function (Response) {
            $('.item-list > tbody:last-child').append(Response);
            calculateTotal();
        }
    });
}

function orderSetMenu(setMenuID) {
    $.ajax({
        type: 'GET',
        url: '/make_order/setMenuList/' + setMenuID,
        success: function (Response) {
            $('.item-list > tbody:last-child').append(Response);
            calculateTotal();
        }
    });
}

function addOnOK(itemID,uniqid) {
    addOnID         = '';
    addOnVal        = 0;
    $('#addon-' + itemID + '-' + uniqid + ' input:checkbox').each(function () {
        if($(this).is(':checked')) {
            addon       = $(this).val();

            addon_array = addon.split(',');
            addOnID    += "," + addon_array[0];
            addOnVal    = addon_array[1];
        }
    });

    $('input#addon-' + itemID + '-' + uniqid).val(addOnID);
    $('input#extra-' + itemID + '-' + uniqid).val(addOnVal);
    changePrice     = calculateItemByQty(itemID,uniqid);
    $('input#amount-' + uniqid).val(changePrice);
    $('input#price-' + itemID + '-' + uniqid).val(changePrice);
    calculateTotal();

}

$(document).ready(function(){
    $('#order-item').click(function(){
        var itemCount   = parseInt($('.item-list tbody tr').length);
        if (itemCount <= 0) {
            alert("Order unable to send");
        } else {
            $("#order-form").submit();
        }
    });
});

function calculateItemByQty(itemID,uniqid) {
    priceOrigin     = $('#price-' + uniqid).text();

    extraOrigin     = $('input#extra-' + itemID + '-' + uniqid).val();
    if (isNaN(extraOrigin)) {
        extraOrigin  = 0;
    }
    console.log(extraOrigin);

    amount = parseFloat(priceOrigin) + parseFloat(extraOrigin);
    return amount;
}

function calculateTotal() {
    //Calculate For Price
    var price_arr   = $('input[name="price[]"]').map(function () {
        return this.value;
    }).get();

    var priceTotal  = 0;
    for (key in price_arr) {
        priceTotal      += parseFloat(price_arr[key]);
    }
    $('input.price_total').val(priceTotal);

	net_amount 			= priceTotal;

    document.getElementById('price-total').textContent  = net_amount;
    $('input#price-total').val(net_amount);
}