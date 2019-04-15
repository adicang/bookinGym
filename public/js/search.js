
window.onload = function () {
    var url_string = window.location.href;
    var url = new URL(url_string);
    var c = url.searchParams.get("address");
    if (c > "") {
        document.getElementById('autocomplete').value = c;
        initAutocomplete();
        showDetails();
    }


}

function open_gym_page() {
    var gymId = event.srcElement.id;
    window.location = '/gymPage.php?gymId=' + gymId;
}

function unParse(str) {
    if (str.includes("&quot;")) {
        var res = str.replace('&quot;', '"');
        return res;
    }
    else{
        return str;
    }
}


var customIcon = {
    gym: {
        icon: 'images/iconGym.png'
    },
    studio: {
        icon: 'images/iconStudio.png'
    },
    pool: {
        icon: 'images/iconPool.png'
    }
};

function showDetails() {

    var card = document.getElementById("card");
    for (var i = card.children.length - 1; i >= 0; i--) {
        card.removeChild(card.children[i]);
    }

    var str = "include/map_data1.php?";
    var arr = ["gym", "studio", "pool", "TRX", "zumba", "Pilatis_Machine", "Pilatis_mattress", "Shaping", "HIIT", "yoga", "Spinning", "kikbox", "swimmingPool", "spa", "parking", "accessibility","1star","2star","3star","4star","5star"];
    for (var i = 0; i < arr.length; i++) {
        if (document.getElementById(arr[i]).checked) {
            if (str.includes("=")) {
                str = str + "&" + arr[i] + "=1";
            }
            else {
                str = str + arr[i] + "=1";
            }
        }
    }

    var lat = returnLat();
    if (!lat) {
        var url_string = window.location.href;
        var url = new URL(url_string);
        var lat1 = url.searchParams.get("lat");
        if (lat1 > "") {
            lat = lat1;
        }
    }
    if (!lat || lat=="undefined") {
        lat = 32.0853;
    }
    var lng = returnLng();
    if (!lng) {
        var url_string = window.location.href;
        var url = new URL(url_string);
        var lng1 = url.searchParams.get("lng");
        if (lng1 > "") {
            lng = lng1;
        }
    }
    if (!lng || lng=="undefined") {
        lng = 34.7818;
    }
    var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(lat, lng),
        zoom: 14
    });
    var infoWindow = new google.maps.InfoWindow;

    downloadUrl(str, function (data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('marker');
        Array.prototype.forEach.call(markers, function (markerElem) {
            var id = markerElem.getAttribute('id');
            var name = markerElem.getAttribute('name');
            var address = markerElem.getAttribute('address');
            var type = markerElem.getAttribute('type');
            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));
            var logoSource = "images/GymImg/";
            var logoName = markerElem.getAttribute('logo');
            var logo = logoSource.concat(logoName);


            var searchBox_lat_lng = new google.maps.LatLng(lat, lng);
            var distance_from_location = google.maps.geometry.spherical.computeDistanceBetween(searchBox_lat_lng, point); //distance in meters between your location and the marker
            if (distance_from_location <= 10000) {

                //card
                var gymCard = document.createElement('div');
                gymCard.setAttribute("class", "gymCardStyle");
                var strong = document.createElement('strong');
                strong.textContent = name
                strong.setAttribute("class", "gymCardStyleText");
                gymCard.appendChild(strong);
                gymCard.appendChild(document.createElement('br'));

                var addressParsed=unParse(markerElem.getAttribute('address'));
                var text = document.createElement('text');
                text.setAttribute("class", "gymCardStyleText");
                text.textContent = addressParsed
                gymCard.appendChild(text);

                gymCard.appendChild(document.createElement('br'));
                var imageEl = document.createElement('img');
                imageEl.setAttribute("id", "gymCardStyleImage");
                imageEl.setAttribute("width", "50px");
                imageEl.setAttribute("height", "50px");
                imageEl.src = logo;
                gymCard.appendChild(imageEl);
                gymCard.appendChild(document.createElement('br'));
                var btn = document.createElement("BUTTON");
                btn.setAttribute("class", "btn btn-info text-center gymBtnStyle");
                btn.setAttribute("id", id);
                btn.setAttribute("onClick", "open_gym_page()")
                var t = document.createTextNode("ראה מועדון כושר");
                btn.appendChild(t);
                gymCard.appendChild(btn);
                gymCard.appendChild(document.createElement('br'));
                card.appendChild(gymCard);

                //map
                var infowincontent = document.createElement('div');
                var strong1 = document.createElement('strong');
                strong1.textContent = name
                infowincontent.appendChild(strong1);
                infowincontent.appendChild(document.createElement('br'));

                var text1 = document.createElement('text');
                text1.textContent = addressParsed
                infowincontent.appendChild(text1);

                var imageEl1 = document.createElement('img');
                imageEl1.setAttribute("width", "50px");
                imageEl1.setAttribute("height", "50px");
                imageEl1.src = logo;
                infowincontent.appendChild(imageEl1);
                var icon = customIcon[type] || {};
                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    icon: customIcon[type].icon
                });
                marker.addListener('click', function () {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                    var cardBtn = document.getElementById(id);
                    cardBtn.setAttribute("style", "box-shadow: 5px 8px 8px 5px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);");
                    window.setTimeout(function () { cardBtn.setAttribute("style", "box-shadow: 0px 0px 0px 0px);"); }, 4000);
                });
            }
        });

    });

}




function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);
}

function doNothing() { }






