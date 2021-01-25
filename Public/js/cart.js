$(document).ready(function () {
    var myLanguage = {
        errorTitle: 'عفوا، هناك أخطاء!'
    };
});

function deleteItem(btn, e) {
    e.preventDefault();
    if (confirm("هل تريد فعلا حذف هذا العنصر؟")) {
        var obj = {
            ajax_action: 'Cart.delete',
            item_id: $(btn).attr('item_id')
        };
        $.post(
            cm_app_index,
            obj,
            function (data) {
                if (data == 1) {
                    window.location.reload();
                } else {
                    alert("واجهتا مشاكل، المرجو المحاولة.");
                }
            },
            'html'
        );
    }
}


function addcheck() {
    var a, b, c;
    var itemname = [];
    var itemprice = [];
    var quantity = [];
    $('.table').find('tr').find('.price-pr').find('p').each(function () {
        a = this.id;
        var a2 = $('#' + a).text();
        itemprice.push(a2);
    })

    $('.table').find('tr').find('.quantity-box').find('input[type=number]').each(function () {
        c = this.id;
        var c2 = $('#' + c).val();
        quantity.push(c2);
    })

    $('.table').find('tr').find('.name-pr').find('p').each(function () {
        b = this.id;
        var b2 = $('#' + b).text();
        itemname.push(b2);
    })
    var obj = {
        ajax_action: 'Cart.addcheck',
        itemname: itemname,
        itemprice: itemprice,
        quantity: quantity
    };

    $.post(
        cm_app_index,
        obj,
        function () {
            window.location.pathname = "TheWayShop/Public/CheckOutCart/index";
        },
        'html'
    );
}

var total = 0;
$(":input[type=number]").bind('keyup mouseup', function () {
    var a, c;
    var arr = [];
    var arr3 = [];
    $('.table').find('tr').find('.price-pr').find('p').each(function () {
        a = this.id;
        var a2 = $('#' + a).text();
        arr.push(a2);
    })
    $('.table').find('tr').find('.quantity-box').find('input[type=number]').each(function () {
        c = this.id;
        var c2 = $('#' + c).val();
        arr3.push(c2);
    })

    arr.map(function (num, idx) {
        var d = num * arr3[idx];
        total = Number(d) + Number(total);
        $("#total").html(total);
    });
    total = 0;
});