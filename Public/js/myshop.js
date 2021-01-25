$(document).ready(function () {
    var myLanguage = {
        errorTitle: 'عفوا، هناك أخطاء!'
    };
});

var s = document.getElementById("Address");
removeDuplicateOptions(s, function (o) {
    return o.value + o.innerHTML;
});

var d = document.getElementById("Category");
removeDuplicateOptions(d, function (o) {
    return o.value + o.innerHTML;
});

function removeDuplicateOptions(u, comparitor) {
    if (u.tagName.toUpperCase() !== 'SELECT') {
        return false;
    }
    var c, i, o = u.options,
        sorter = {};
    if (!comparitor || typeof comparitor !== 'function') {
        comparitor = function (o) {
            return o.value;
        };
    }
    for (i = 0; i < o.length; i++) {
        c = comparitor(o[i]);
        if (sorter[c]) {
            u.removeChild(o[i]);
            i--;
        } else {
            sorter[c] = true;
        }
    }
    return true;
}