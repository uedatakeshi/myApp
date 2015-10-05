(function(){
    'use strict';

    window.jQuery = window.$ = require('jquery');
    require('bootstrap');
    require('jquery-ui/datepicker');
    var message = 'Hello App';
    console.log(message);

    $( ".datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });



    $('#myModal').on('shown.bs.modal', function (e) {
        $( ".datepicker" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    })

    $('#myModal').on('hidden.bs.modal', function (e) {
        $(this).removeData();
    });
})();
