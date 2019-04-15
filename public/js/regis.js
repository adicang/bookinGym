function addUserToDatabase() {
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var myObj = JSON.parse(this.responseText);
            if (myObj.code == 1){
                window.location.href="regSuccess.php"
            }
            else
                document.getElementById("RegError").innerHTML = myObj.regError;
        }
    }
    
    request.open("POST", '../include/regis.php', true);
    request.setRequestHeader('Content-type', 'application/json');
    var user_data = {
        "adminUser": document.getElementById("adminUser").checked,
        "traineeUser": document.getElementById("traineeUser").checked,
        "fullname": document.getElementById("fullname").value,
        "username": document.getElementById("username").value,
        "email": document.getElementById("email").value,
        "password": document.getElementById("password").value,
        "male": document.getElementById("male").checked,
        "female": document.getElementById("female").checked,
        "address": document.getElementById("autocomplete").value,
        "yearOfBirth": document.getElementById("yearOfBirth").value,
    }

    var data = JSON.stringify(user_data);
    request.send(data);
}
