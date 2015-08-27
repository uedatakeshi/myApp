(function(){
    window.jQuery = $ = require('jquery');
    require('bootstrap');
    require('jquery-ui/datepicker');
    var message = 'Hello App';
    console.log($( ".datepicker" ).attr('name'));
    console.log(message);
    $( ".datepicker" ).datepicker({
        dateFormat: "yy-mm-dd"
    });
})();
