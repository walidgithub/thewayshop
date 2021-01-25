$(document).ready(function () {
    var myLanguage = {
        errorTitle: 'عفوا، هناك أخطاء!'
    };
});

function deleteItem(btn, e) {
    e.preventDefault();
    if (confirm("هل تريد فعلا حذف هذا العنصر؟")) {
        var obj = {
            ajax_action: 'WishList.delete',
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

function addtocart(btn, e) {
    e.preventDefault();
    var obj = {
        ajax_action: 'WishList.addcart',
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