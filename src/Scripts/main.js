(function(){
    'use strict';

    window.jQuery = window.$ = require('jquery');
    require('bootstrap');
    require('jquery-ui/datepicker');
    var Hello = require('./Hello');

    var hello = new Hello();
    console.log(hello.message);

    $( ".datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    })

    $( "#myModal" ).on('shown.bs.modal', function (e) {
        $( ".datepicker" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    });

    $( "#myModal" ).on('hidden.bs.modal', function (e) {
        $(this).removeData();
    });
})();
