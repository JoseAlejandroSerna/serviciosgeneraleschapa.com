// Only for Sales Dashboard but you can use other pages as well
$(function () {
    "use strict";

    flatpickr(".flatpickr");

    // testing
    // flatpickr(document.querySelectorAll(".ClassName"), {});

    flatpickr(document.querySelectorAll(".dateandtime"), {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        inline: true
    });

    flatpickr(document.querySelectorAll(".humanFriendly"), {
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
    });

    flatpickr(document.querySelectorAll(".range"), {
        mode: "range"
    });

    flatpickr(document.querySelectorAll(".timepicker"), {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        defaultDate: "13:45"
    });
});