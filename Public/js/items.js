$(document).ready(function () {
    var myLanguage = {
        errorTitle: 'عفوا، هناك أخطاء!'
    };
});

function deleteItem(btn, e) {
    e.preventDefault();
    if (confirm("هل تريد فعلا حذف هذا العنصر؟")) {
        var obj = {
            ajax_action: 'Items.delete',
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