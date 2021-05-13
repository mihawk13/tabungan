/*DataTable Init*/

"use strict";

$(document).ready(function () {
    "use strict";

    $("#datable_1").DataTable();
    $("#datable_2").DataTable({ lengthChange: false });

    $("#datable_3").DataTable({
        order: [[0, "desc"]],
    });
});
