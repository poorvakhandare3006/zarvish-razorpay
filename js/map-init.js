function init(){var e={zoom:12,center:new google.maps.LatLng(40.67,-73.94),scrollwheel:!1,styles:[{featureType:"water",elementType:"geometry.fill",stylers:[{color:"#abd0fa"}]},{featureType:"transit",stylers:[{color:"#808080"},{visibility:"off"}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{visibility:"on"},{color:"#e1d9c6"}]},{featureType:"road.highway",elementType:"geometry.fill",stylers:[{color:"#eee9da"}]},{featureType:"road.local",elementType:"geometry.fill",stylers:[{visibility:"on"},{color:"000"},{weight:1.8}]},{featureType:"road.local",elementType:"geometry.stroke",stylers:[{color:"#d7d7d7"}]},{featureType:"poi",elementType:"geometry.fill",stylers:[{visibility:"on"},{color:"#ebebeb"}]},{featureType:"administrative",elementType:"geometry",stylers:[{color:"#eee9da"}]},{featureType:"road.arterial",elementType:"geometry.fill",stylers:[{color:"#fffbf8"}]},{featureType:"road.arterial",elementType:"geometry.fill",stylers:[{color:"#fffbf8"}]},{featureType:"landscape",elementType:"geometry.fill",stylers:[{visibility:"on"},{color:"#fbf7ee"}]},{featureType:"road",elementType:"labels.text.fill",stylers:[{color:"#d6d6d6"}]},{featureType:"administrative",elementType:"labels.text.fill",stylers:[{visibility:"on"},{color:"#3c3424"}]},{featureType:"poi",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"poi",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"road.arterial",elementType:"geometry.stroke",stylers:[{color:"#d6d6d6"}]},{featureType:"road",elementType:"labels.icon",stylers:[{visibility:"off"}]},{},{featureType:"poi",elementType:"geometry.fill",stylers:[{color:"#aee9c6"}]}]},l=document.getElementById("map"),t=new google.maps.Map(l,e);new google.maps.Marker({position:new google.maps.LatLng(40.67,-73.94),map:t,icon:"images/custom/beachflag.png",title:"Snazzy!"})}google.maps.event.addDomListener(window,"load",init);