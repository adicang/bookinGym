var placeSearch, autocomplete;
var lat, long;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
    document.getElementById('autocomplete'), { types: ['geocode'] });

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields('address_components');

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();
  lat = place.geometry.location.lat();
  long = place.geometry.location.lng();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      geocodeLatLng(position.coords.latitude, position.coords.longitude);
      var circle = new google.maps.Circle(
        { center: geolocation, radius: position.coords.accuracy });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}

function returnLat() {
  return lat;
}

function returnLng() {
  return long;
}

function geocodeLatLng(lat1, lng1) {
  lat=lat1;
  long=lng1;
  var geocoder = new google.maps.Geocoder;
  var latlng = { lat: parseFloat(lat1), lng: parseFloat(lng1) };
  geocoder.geocode({ 'location': latlng }, function (results, status) {
    if (status === 'OK') {
      if (results[0]) {
        document.getElementById("autocomplete").value = (results[0].formatted_address);
      }
    }
  });
}

