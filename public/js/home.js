function onClickFindGym (event) {
    var address = document.getElementById('autocomplete').value;


    window.location = '/searchGym.html?address=' + address;
   
}