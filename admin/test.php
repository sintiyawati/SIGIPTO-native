<div class="pac-card" id="pac-card">
    <div>
        <div id="label">Location search</div>
    </div>
    <div id="pac-container">
        <input id="pac-input" type="text" placeholder="Enter a location">
        <div id="location-error"></div>
    </div>
</div>
<div id="maps" class="gmaps"></div>
<div id="infowindow-content">
    <img src="" width="16" height="16" id="place-icon"> <span
        id="place-name" class="title"></span><br> <span
        id="place-address"></span>
</div>

<script>
  function initMap() {
    var centerCoordinates = new google.maps.LatLng(37.6, -95.665);
    var map = new google.maps.Map(document.getElementById('maps'), {
      center : centerCoordinates,
      zoom : 4
    });
    var card = document.getElementById('pac-card');
    var input = document.getElementById('pac-input');
    var infowindowContent = document.getElementById('infowindow-content');
 
    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
 
    var autocomplete = new google.maps.places.Autocomplete(input);
    var infowindow = new google.maps.InfoWindow();
    infowindow.setContent(infowindowContent);
 
    var marker = new google.maps.Marker({
      map : map
    });
 
    autocomplete.addListener('place_changed',function() {
      document.getElementById("location-error").style.display = 'none';
      infowindow.close();
      marker.setVisible(false);
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        document.getElementById("location-error").style.display = 'inline-block';
        document.getElementById("location-error").innerHTML = "Cannot Locate '" + input.value + "' on map";
        return;
      }
 
      map.fitBounds(place.geometry.viewport);
      marker.setPosition(place.geometry.location);
      marker.setVisible(true);
 
      infowindowContent.children['place-icon'].src = place.icon;
      infowindowContent.children['place-name'].textContent = place.name;
      infowindowContent.children['place-address'].textContent = input.value;
      infowindow.open(map, marker);
    });
  }
</script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&libraries=places&callback=initMap"
    async defer></script>