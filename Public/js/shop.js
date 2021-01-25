$(document).ready(function () {
    var myLanguage = {
        errorTitle: 'عفوا، هناك أخطاء!'
    };
});

function addtowishlist(btn, e) {
    e.preventDefault();
    var obj = {
        ajax_action: 'shop.addwishlist',
        item_id: $(btn).attr('item_id')
    };
    $.post(
        cm_app_index,
        obj,
        function (data) {
            if (data == 1) {
                var s = $(btn).attr('item_id');
                $('#' + s).each(function () {
                    if ($(this).children('.fa-heart').length) {
                        $('#' + s + ' i').removeClass('far fa-heart');
                        $('#' + s + ' i').addClass('fas fa-heart');
                    }
                });
            } else if (data == 2) {
                var s = $(btn).attr('item_id');
                $('#' + s).each(function () {
                    if ($(this).children('.fa-heart').length) {
                        $('#' + s + ' i').removeClass('fas fa-heart');
                        $('#' + s + ' i').addClass('far fa-heart');
                    }
                });
            } else if (data == 0) {
                $('#myModal').modal('show');
            }
        },
        'html'
    );
}

function addtocart(btn, e) {
    e.preventDefault();
    var obj = {
        ajax_action: 'Shop.addcart',
        item_id: $(btn).attr('item_id')
    };
    $.post(
        cm_app_index,
        obj,
        function (data) {
            if (data == 1) {
                var s = $(btn).attr('item_id');
                $('#' + s).each(function () {
                    var d = $(btn).attr('class');
                    if (d == "cart") {
                        $('#' + s).removeClass('cart');
                        $('#' + s).addClass('cartadded');
                        $('#' + s).text("In cart");
                    }
                });
            } else if (data == 2) {
                var s = $(btn).attr('item_id');
                $('#' + s).each(function () {
                    var d = $(btn).attr('class');
                    if (d == "cartadded") {
                        $('#' + s).removeClass('cartadded');
                        $('#' + s).addClass('cart');
                        $('#' + s).text("Add to cart");
                    }
                });
            } else if (data == 0) {
                $('#myModal').modal('show');
            }
        },
        'html'
    );
}
