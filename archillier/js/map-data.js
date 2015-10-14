/* global google, location_data */
/* jshint 
    curly: false 
*/
var HOME = (function($) {
    'use strict';

    var infoWindow;
    var map;

    var MAP_CENTER_LAT = 25;  
    var MAP_CENTER_LNG = 25;


    /*var openInfoWindow = function(theMarker) {

        // only initialize it once
        if(!infoWindow) {
            infoWindow = new google.maps.InfoWindow({
                maxWidth : INFO_WINDOW_MAX_WIDTH
            });
        }

        infoWindow.setContent( this.description );
        infoWindow.open(map, this);
                
    };*/

    var openInfoWindow = function(theMarker) {

        // only initialize it once

        if(!infoWindow) {
            infoWindow = new InfoBubble({
                minWidth : 300,
                minHeight: 75,
                shadowStyle : 0,
                borderRadius : 1,
                arrowSize : 30,
                arrowPosition : 25,
                arrowStyle : 1,
                disableAutoPan : false
            });
        }

        infoWindow.setContent( this.description );
        infoWindow.open(map, this);

    }

    var initMarkers = function(){

//        var image = new google.maps.MarkerImage('http://labs.google.com/ridefinder/images/mm_20_red.png',
        var image = new google.maps.MarkerImage('http://dbudell.com/incubator/archilier_beta/wp-content/themes/archillier/img/marker.png',
            // This marker is 20 pixels wide by 32 pixels tall.
            new google.maps.Size(7, 7),
            // The origin for this image images 0,0.
            new google.maps.Point(0,0),
            // The anchor for this image is the base of the flagpole at 0,32.
            //new google.maps.Point(6, 20));
            new google.maps.Point(0, 0));
        var shadow = new google.maps.MarkerImage('http://labs.google.com/ridefinder/images/mm_20_shadow.png',
              // The shadow image is larger in the horizontal dimension
              // while the position and offset are the same as for the main image.
              new google.maps.Size(22, 20),
              new google.maps.Point(0,0),
              new google.maps.Point(6, 20));
              // Shapes define the clickable region of the icon.
              // The type defines an HTML &lt;area&gt; element 'poly' which
              // traces out a polygon as a series of X,Y points. The final
              // coordinate closes the poly by connecting to the first
              // coordinate.
        var shape = {
            coord: [4,0,0,4,0,7,3,11,4,19,7,19,8,11,11,7,11,4,7,0],
            type: 'poly'
        };
    
        // iterate through location_data and drop in markers        
        for (var i = 0, len = location_data.length; i < len; i++) {
// 
            var theContent; // = '<b>' + location_data[i].title + '</b> <br>';

            theContent = 
                '<div class="map-info">' + 
                '<p class="map-info-title">' + location_data[i].title + '</p>' +
                '<p class="map-info-location">' + location_data[i].projectLocation + '</p>' +
                '<a class="map-info-permalink" href="' + location_data[i].permalink + '">View Project</a>' ;

            // debugger;
            var _location = location_data[i].map.split(',');

            var marker = new google.maps.Marker({
                position : new google.maps.LatLng( _location[0], _location[1] )
                ,map     : map
                ,shadow  : shadow
                ,icon    : image
                ,shape   : shape
                ,title   : location_data[i].title
                ,description : theContent
            });

                 
            // Creating the event listener. It now has access to the values of 
            // i and marker as they were during its creation 
            google.maps.event.addListener(marker, 'click', openInfoWindow);
        } // End the for loop    
    };


    var initMap = function () {
        if (!location_data) 
            return false;
        
        map = new google.maps.Map(document.getElementById('project-map'),  {
            center                  : new google.maps.LatLng(MAP_CENTER_LAT, MAP_CENTER_LNG) 
            ,zoom                   : 3
            ,mapTypeId              : google.maps.MapTypeId.ROADMAP
            ,disableDefaultUI       : true
            ,navigationControl      : true
            ,keyboardShortcuts      : false
            ,disableDoubleClickZoom : true
            ,draggable              : true
            ,scrollwheel            : false
            ,noClear                : true // useful for the gallery. Preserves inner content.
            ,backgroundColor        : '#fff'
            ,navigationControlOptions: {
                style : google.maps.NavigationControlStyle.SMALL
            }
            ,panControl : false
            ,styles: [{
                    "featureType": "administrative",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#444444"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#ededed"
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "labels.text",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 45
                        },
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                }]        
        });

     
        initMarkers();


        // the coordinates
        var coordinates     = [];
        var thealt          = [];
        var thedescription  = [];
        var panoraamas       = [];
        //only use one info window and have it bounce around
        
        



               
    };

    var init = function () {
        initMap();
    };
     

    return {
        init : init
    };

}(jQuery));

/*jQuery( document ).ready(function() {
    HOME.init();
});

jQuery( window ).load(function() {
    HOME.init();
});*/

$('.posts-container .toggle').on('click', function(){
        $('.posts-container').hide()
        $('.map-container').show()

        if($('.map-container').length > 0) {
            HOME.init();
        }
})

$('.map-container .toggle').on('click', function(){
    $('.posts-container').show()
    $('.map-container').hide()

    if($('.posts-container').length > 0) {
        triggerMasonry()
    }
})

// hide Google brand elements on map

$('img[src="http://maps.gstatic.com/mapfiles/api-3/images/google_white2.png"]').hide()


