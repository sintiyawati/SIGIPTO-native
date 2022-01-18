  // Google form Tambah data
  var lokasiTempat = document.getElementById('lokasi');
  var latTempat = document.getElementById('lat');
  var lngTempat = document.getElementById('lng');
  var lokasiAutocomplete = new google.maps.places.Autocomplete(lokasiTempat);
  lokasiAutocomplete.addListener("place_changed", () => {
  var getPlace = lokasiAutocomplete.getPlace();
  latTempat.value = getPlace.geometry.location.lat();
  lngTempat.value = getPlace.geometry.location.lng();

  });