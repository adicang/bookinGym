
window.onload = function () {
    var url_string = window.location.href;
    var url = new URL(url_string);
    var c = url.searchParams.get("address");
    
    document.getElementById('autocomplete').value = c;
    initAutocomplete();
    showGyms();

}

