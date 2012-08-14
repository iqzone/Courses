require.config({
    baseUrl: its.vars[ 'baseURl' ] + '/js/'
});

define(['jquery', 'bootstrap', 'focus'], function($) {
    $(function() {
        if( typeof (latLngs) != undefined )
        {
            initialize();
        }
    });
});

function initialize() {
    if(  latLngs.match(/\(\d+\.?\d+\,\s?[+|-]\d+\.?\d+\)/) == null )
        return false;
    
    latLngStr = latLngs;
    
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
        map: map
    });
    return true;
}
