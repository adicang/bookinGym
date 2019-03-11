
    
      
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
      var card =document.getElementById("card"); 
      for( var i = card.children.length -1 ; i >= 0 ; i--) {
        card.removeChild(card.children[i]);
      }
          downloadUrl('map_data.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
			  var logo = markerElem.getAttribute('logo');

              var gymCard = document.createElement('div');
              gymCard.setAttribute("id", "gymCardStyle");
              var strong = document.createElement('strong');
              strong.textContent = name
              strong.setAttribute("id", "gymCardStyleText");
              gymCard.appendChild(strong);
              gymCard.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.setAttribute("id", "gymCardStyleText");
              text.textContent = address
              gymCard.appendChild(text);
             
              gymCard.appendChild(document.createElement('br'));
         var imageEl = document.createElement('img');
         imageEl.setAttribute("id", "gymCardStyleImage");
				imageEl.src=logo;
        gymCard.appendChild(imageEl);
        gymCard.appendChild(document.createElement('br'));gymCard.appendChild(document.createElement('br'));
				gymCard.appendChild(document.createElement('br'));     
        card.appendChild(gymCard);
            });
          });  
        }
	  
        function initMap() {
          var lat = returnLat();
          var lng = returnLng();
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(lat, lng),
          zoom: 14
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('map_data.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));
			  var logo = markerElem.getAttribute('logo');

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
			  
			   var imageEl = document.createElement('img');
				imageEl.src=logo;
				infowincontent.appendChild(imageEl);
              var icon = customIcon[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon: customIcon[type].icon
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
			   
            });
          });		  
        }
		
		



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    