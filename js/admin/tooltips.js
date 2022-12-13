
$(function () {
    "use strict";

    $('[data-toggle="tooltip"]').tooltip();
    // Hover Popover For toolTip
    $('[data-toggle="popover"]').popover({
        // placement : 'top',
        trigger : 'hover'
    });

});