var marker;

require.config({
    baseUrl: its.vars[ 'baseURl' ] + '/js/'
});

define(['jquery', 'bootstrap', 'jquery-ui'], function($) {
    $(function() {
        if( typeof ( $('#Courses_latLng').val() ) != undefined )
        {
            initialize();
            $( '.datepicker' ).datepicker();
        }
    });    
});

function initialize() {
    
    if($('#Courses_latLng').val() == '' || $('#Courses_latLng').val().match(/\(\d+\.?\d+\,\s?[+|-]\d+\.?\d+\)/) == null )
        latLngStr = "(19.405078, -99.159370)";
    else
        latLngStr = $('#Courses_latLng').val();
    
    var latLng = eval("new google.maps.LatLng" + latLngStr);
    
    var myOptions = {
        zoom: 17,
        center: latLng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    
    var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
    
    
    marker = new google.maps.Marker({
        //creamos una marca
        position: latLng, 
        //en la posicion de la varaible que hemos transmitido
        map: map,
        draggable: true
    });

    google.maps.event.addListener(marker, 'dragend', function() {
        $('#Courses_latLng').val(marker.getPosition());
    });
}
