function onClickFindGym (event) {
    var address = document.getElementById('autocomplete').value;
    var lat1= returnLat();
    var lng1 = returnLng();

    window.location = '/searchGym.php?address=' + address + '&lat='+ lat1 +'&lng=' +lng1;
   
}