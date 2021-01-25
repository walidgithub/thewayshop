$(document).ready(function () {
    var myLanguage = {
        errorTitle: 'عفوا، هناك أخطاء!'
    };
});

function addtowishlist(btn, e) {
    e.preventDefault();
    var obj = {
        ajax_action: 'ShopDetail.addwishlist',
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
                    if (d == "btn hvr-hover") {
                        $('#' + s).removeClass('btn hvr-hover');
                        $('#' + s).addClass('btn hvr-hoverIn');
                        $('#' + s).text(" In wishlist");
                    }
                });
            } else if (data == 2) {
                var s = $(btn).attr('item_id');
                $('#' + s).each(function () {
                    var d = $(btn).attr('class');
                    if (d == "btn hvr-hoverIn") {
                        $('#' + s).removeClass('btn hvr-hoverIn');
                        $('#' + s).addClass('btn hvr-hover');
                        $('#' + s).text(" Add to wishlist");
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
        ajax_action: 'ShopDetail.addcart',
        item_id: $(btn).attr('item_id')
    };
    $.post(
        cm_app_index,
        obj,
        function (data) {
            if (data == 1) {
                var s = $(btn).attr('item_id');
                $('#' + s + "cart").each(function () {
                    var d = $(btn).attr('class');
                    if (d == "btn hvr-hover") {
                        $('#' + s + "cart").removeClass('btn hvr-hover');
                        $('#' + s + "cart").addClass('btn hvr-hoverIn');
                        $('#' + s + "cart").text("In cart");
                    }
                });
            } else if (data == 2) {
                var s = $(btn).attr('item_id');
                $('#' + s + "cart").each(function () {
                    var d = $(btn).attr('class');
                    if (d == "btn hvr-hoverIn") {
                        $('#' + s + "cart").removeClass('btn hvr-hoverIn');
                        $('#' + s + "cart").addClass('btn hvr-hover');
                        $('#' + s + "cart").text("Add to cart");
                    }
                });
            } else if (data == 0) {
                $('#myModal').modal('show');
            }
        },
        'html'
    );
}

function addcheck() {
    var obj = {
        ajax_action: 'ShopDetail.addcheck',
        itemname: $('#itemname').text(),
        itemprice: $('#itemprice').text(),
        quantity: $('#itemquant').val()
    };
    $.post(
        cm_app_index,
        obj,
        function () {
            window.location.pathname = "TheWayShop/Public/CheckOut/index";
        },
        'html'
    );
}

var total = 0;
$(":input[type=number]").bind('keyup mouseup', function () {
    var a = $('#itemprice').text();
    var c = $('#itemquant').val();
    var b = Number(c) * Number(a);
    total = Number(b) + Number(total);
    $("#total").html(total);

    total = 0;
});
