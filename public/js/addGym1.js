function addFirstDetails() {
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var myObj = JSON.parse(this.responseText);
            if (myObj.code == 1)
                window.location.href = "addGym2.php";
            else
                document.getElementById("loginError").innerHTML = myObj.loginError;
        }
    }

    var types = document.getElementsByName('type');
    var type_value;
    for (var i = 0; i < types.length; i++) {
        if (types[i].checked) {
            type_value = types[i].value;
        }
    }
    var lat = returnLat();
    var lng = returnLng();

    request.open("POST", '../include/addGym1.php', true);
    request.setRequestHeader('Content-type', 'application/json');
    var user_data = {
        "name": document.getElementById("name").value,
        "email": document.getElementById("email").value,
        "phone": document.getElementById("phone").value,
        "description": document.getElementById("description").value,
        "website": document.getElementById("website").value,
        "address": document.getElementById("autocomplete").value,
        "type": type_value,
        "lat": lat,
        "lng": lng
    }

    var data = JSON.stringify(user_data);
    request.send(data);
}

function showFromTo(day) {
    if (document.getElementById(day).checked) {
        var str = "from" + day;
        document.getElementById(str).style.display = "inline";
        var str = "to" + day;
        document.getElementById(str).style.display = "inline";
    }
    else {
        var str = "from" + day;
        document.getElementById(str).style.display = "none";
        var str = "to" + day;
        document.getElementById(str).style.display = "none";
    }

}

function addClassesAndFacilities() {
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var myObj = JSON.parse(this.responseText);
            if (myObj.code == 1)
                window.location.href = "addGym5.php";
            else
                document.getElementById("loginError").innerHTML = myObj.loginError;
        }
    }


    request.open("POST", '../include/addGym4.php', true);
    request.setRequestHeader('Content-type', 'application/json');
    var user_data = {

        "TRX": document.getElementById("TRX").checked,
        "zumba": document.getElementById("zumba").checked,
        "Pilatis_Machine": document.getElementById("Pilatis_Machine").checked,
        "Pilatis_mattress": document.getElementById("Pilatis_mattress").checked,
        "Shaping": document.getElementById("Shaping").checked,
        "HIIT": document.getElementById("HIIT").checked,
        "yoga": document.getElementById("yoga").checked,
        "Spinning": document.getElementById("Spinning").checked,
        "kikbox": document.getElementById("kikbox").checked,
        "swimmingPool": document.getElementById("swimmingPool").checked,
        "spa": document.getElementById("spa").checked,
        "parking": document.getElementById("parking").checked,
        "accessibility": document.getElementById("accessibility").checked
    }

    var data = JSON.stringify(user_data);
    request.send(data);
}

function addCardsAndSubscription() {
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var myObj = JSON.parse(this.responseText);
            if (myObj.code == 1)
                window.location.href = "addGym_final.php";
            else
                document.getElementById("loginError").innerHTML = myObj.loginError;
        }
    }

    request.open("POST", '../include/addGym5.php', true);
    request.setRequestHeader('Content-type', 'application/json');
    var user_data = {
        "businessNum": document.getElementById("businessNum").value,
        "accountNum": document.getElementById("accountNum").value,
        "branchNum": document.getElementById("branchNum").value,
        "subscription": document.getElementById("subscription").checked,
        "card": document.getElementById("card").checked,
        "periodTimeSub": document.getElementById("periodTimeSub").value,
        "periodTypeSub": document.getElementById("periodTypeSub").value,
        "priceSub": document.getElementById("priceSub").value,
        "enterCount": document.getElementById("enterCount").value,
        "priceCard": document.getElementById("priceCard").value,
        "periodTimeCard": document.getElementById("periodTimeCard").value,
        "periodTypeCard": document.getElementById("periodTypeCard").value,
    }

    var data = JSON.stringify(user_data);
    request.send(data);
}

function addDaysAndHours() {
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var myObj = JSON.parse(this.responseText);
            if (myObj.code == 1)
                window.location.href = "addGym3.php";
            else
                document.getElementById("loginError").innerHTML = myObj.loginError;
        }
    }


    request.open("POST", '../include/addGym2.php', true);
    request.setRequestHeader('Content-type', 'application/json');
    var user_data = {
        "Sunday": document.getElementById("Sunday").checked,
        "fromSunday": document.getElementById("fromSunday1").value,
        "toSunday": document.getElementById("toSunday1").value,
        "Monday": document.getElementById("Monday").checked,
        "fromMonday": document.getElementById("fromMonday1").value,
        "toMonday": document.getElementById("toMonday1").value,
        "Tuesday": document.getElementById("Tuesday").checked,
        "fromTuesday": document.getElementById("fromTuesday1").value,
        "toTuesday": document.getElementById("toTuesday1").value,
        "Wednesday": document.getElementById("Wednesday").checked,
        "fromWednesday": document.getElementById("fromWednesday1").value,
        "toWednesday": document.getElementById("toWednesday1").value,
        "Thursday": document.getElementById("Thursday").checked,
        "fromThursday": document.getElementById("fromThursday1").value,
        "toThursday": document.getElementById("toThursday1").value,
        "Friday": document.getElementById("Friday").checked,
        "fromFriday": document.getElementById("fromFriday1").value,
        "toFriday": document.getElementById("toFriday1").value,
        "Saturday": document.getElementById("Saturday").checked,
        "fromSaturday": document.getElementById("fromSaturday1").value,
        "toSaturday": document.getElementById("toSaturday1").value,
    }

    var data = JSON.stringify(user_data);
    request.send(data);
}

function showNewImgDiv(id) {
    var str1 = "addImage";
    var str2 = id;
    var element = str1.concat(str2);
    document.getElementById(element).style.display = "block";
}

function preview_image(event, id, title) {
   
    const reader = new FileReader();
	
    reader.onload = function () {
        var src = reader.result;
        var url = "url(" + src + ")";
        document.getElementById(id).style.backgroundImage = url;
        document.getElementById(id).style.backgroundSize = "200px 200px";
        document.getElementById(title).innerHTML = "לחץ להחלפת התמונה";
		document.getElementById(title).style.backgroundColor= "white";
    }
    reader.readAsDataURL(event.target.files[0]);
    
}

function uploadedImage(event, id, addId,title) {
    preview_image(event, id,title);
    showNewImgDiv(addId);
}


function preview_logo(event) {
    const reader = new FileReader();
    reader.onload = function () {

        var src = reader.result;
        var url = "url(" + src + ")";
        document.getElementById('insertLogo').style.backgroundImage = url;
        document.getElementById("insertLogo").style.backgroundSize = "200px 200px";
        document.getElementById("logoTitle").innerHTML = "לחץ להחלפת התמונה";
        document.getElementById("logoTitle").style.backgroundColor= "white";
    }
    reader.readAsDataURL(event.target.files[0]);
}

function preview_pdf(){
    var url="url(../images/pdfCheck.png)";
    document.getElementById('insertPdf').style.backgroundImage = url;
}