<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
	<?php include('head.php');?>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7wKjMfXH1tQlKZpiv3KPA4ajACz yJ-Hw&callback=myMap"></script>
	<script type="text/javascript">
				
		function myMap() {

			var myCenter = new google.maps.LatLng(18.997954, 72.852405); var mapCanvas = document.getElementById("map"); var mapOptions = {center: myCenter, zoom: 5};


			var map = new google.maps.Map(mapCanvas, mapOptions);


			var marker = new google.maps.Marker({position:myCenter}); marker.setMap(map);

		}

		function loadDoc() {
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			myFunction(this);
			}
		  };
		  xhttp.open("GET", "abUs.xml", true);
		  xhttp.send();
		}
		function myFunction(xml) {
		  var i;
		  var xmlDoc = xml.responseXML;
		  /* var table="<tr><th>Name</th><th></th></tr>";
		  var x = xmlDoc.getElementsByTagName("CD");
		  for (i = 0; i <x.length; i++) { 
			table += "<tr><td>" +
			x[i].getElementsByTagName("TITLE")[0].childNodes[0].nodeValue +
			"</td><td>" +
			x[i].getElementsByTagName("ARTIST")[0].childNodes[0].nodeValue +
			"</td></tr>";
		  } */
		  // var x = xmlDoc.getElementsByTagName("college")[0];
		  x += "<h3>" + x.getElementsByTagName("title")[0].childNodes[0].nodeValue + "</h3>" + "<h4>" + x.getElementsByTagName("website")[0].childNodes[0].nodeValue + "</h4>" + x.getElementsByTagName("phone")[0].childNodes[0].nodeValue + "</h4>" + x.getElementsByTagName("email")[0].childNodes[0].nodeValue + "</h4>" + x.getElementsByTagName("address")[0].childNodes[0].nodeValue + "</h4>";
		  document.getElementById("abUsXml").innerHTML = x;
		  alert(x.getElementsByTagName("title")[0].childNodes[0].nodeValue);
}
	</script>
</head>
<body onload="loadDoc()">
	<?php include('sakecBlogHead.php'); ?>
	<main>
		<div id="abUsXml" onclick="loadDoc()">
			<!-- [click me] -->
		<div/>
		<div class="imap" id="map">
		<p></p>
		</div>
		<br/>
		<iframe id="gmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.352897338798!2d72.9094694145329!3d19.04821568710389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c5f39a7d77d1%3A0x9ebbdeaea9ec24ae!2sShah+%26+Anchor+Kutchhi+Engineering+College!5e0!3m2!1sen!2sin!4v1541146232389" frameborder="0" style="border:0" allowfullscreen></iframe>
	</main>
	<?php include('sakecBlogFoot.php'); ?>
</body>
</html>