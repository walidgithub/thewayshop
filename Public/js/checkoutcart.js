$(document).ready(function () {
    var myLanguage = {
        errorTitle: 'عفوا، هناك أخطاء!'
    };
});

function addshippingcost(option) {
    if (option == "option1") {
        $("#shippingcost").html("Free");
        $("#total").html('#itemstotal'.text());

    } else if (option == "option2") {
        $("#shippingcost").html("10");
        var a = $('#itemstotal').text();
        var b = $('#shippingcost').text();
        $("#total").html(Number(a) + Number(b));

    } else if (option == "option3") {
        $("#shippingcost").html("20");
        var a = $('#itemstotal').text();
        var b = $('#shippingcost').text();
        $("#total").html(Number(a) + Number(b));
    }
}