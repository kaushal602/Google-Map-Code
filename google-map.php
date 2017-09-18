<div id="drop">
    <div id="map"></div>
</div>

function initMap() {
    var myLatLng = {
        lat: 40.002590,
        lng: -75.024964
    };
    var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        scrollwheel: false,
        disableDefaultUI: false,
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var image = 'wp-content/themes/wash-line/assets/images/map-marker.png';
    var marker = new google.maps.Marker({
        map: map,
        position: myLatLng,
        icon: image,
        animation: google.maps.Animation.DROP,
        title: 'The Wash Line'
    });
    marker.addListener('click', toggleBounce);

    function toggleBounce() {
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }
     var infowindow = new google.maps.InfoWindow({ // Create a new InfoWindow
            content:"<h4>The Wash Line</h4><p>213 W Broad St, Palmyra, NJ 08065</p>" 
        });
      setTimeout(function() {
        infowindow.open(map,marker);
    }, 1000);
       //infowindow.open(map,marker); 
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map,marker); 
        });
}
