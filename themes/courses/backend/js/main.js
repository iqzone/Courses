require.config({
    baseUrl: its.vars[ 'baseURl' ] + '/js/'
});

define(['jquery', 'bootstrap', 'jquery-ui'], function($) {
    $(function() {
	$( '.datepicker' ).datepicker();
    });
});