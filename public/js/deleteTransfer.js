function removeCardTransfer(transferId){
    var request = new XMLHttpRequest();
  
      request.onreadystatechange = function () {
          if (request.readyState == 4 & request.status == 200) {
              var myObj = JSON.parse(this.responseText);
              if (myObj.code == 1)
                  window.location.href = "transferDisplay.php";
          }
      }
  
      
      request.open("POST", '../include/deleteTransferCard.php', true);
      request.setRequestHeader('Content-type', 'application/json');
      var user_data = {
          "id": transferId
      }
  
      var data = JSON.stringify(user_data);
      request.send(data);
  }
  
  function removeSubTransfer(transferId){
    var request = new XMLHttpRequest();
  
      request.onreadystatechange = function () {
          if (request.readyState == 4 & request.status == 200) {
              var myObj = JSON.parse(this.responseText);
              if (myObj.code == 1)
                  window.location.href = "transferDisplay.php";
          }
      }
  
      
      request.open("POST", '../include/deleteTransferSub.php', true);
      request.setRequestHeader('Content-type', 'application/json');
      var user_data = {
          "id": transferId
      }
  
      var data = JSON.stringify(user_data);
      request.send(data);
  }