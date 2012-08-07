require.config({
    baseUrl: its.vars[ 'baseURl' ] + '/js/'
});

define(['jquery', 'bootstrap', 'focus'], function($) {
    $().ready(function(){
        $('#masthead-carousel').carousel ({ interval: false });
    });
});


