function getSize()
	{
	var w = document.documentElement.clientWidth;
	var h = document.documentElement.clientHeight;
	        
	// put the result into a h1 tag
	 document.getElementById('w').innerHTML = "W: " + w;
	 document.getElementById('h').innerHTML = "H: " + h;
	}

function navHam() {
    var x = document.getElementsByTagName("nav")[0];
    if (x.className === "nav") {
        x.className = "ham";
    } else {
        x.className = "nav";
    }

}

// // Get the modal
// 	var modal = document.getElementById('signin-modal');
// 	var form = document.getElementById('signup-form');

// 	// Get the button that opens the modal
// 	var btn = document.getElementById("signin");

// 	// Get the <span> element that closes the modal
// 	var span = document.getElementsByClassName("close")[0];

// 	// When the user clicks on the button, open the modal 
// 	btn.onclick = function() {
// 	    modal.style.display = "block";
// 	}

// 	// When the user clicks on <span> (x), close the modal
// 	span.onclick = function() {
// 	    modal.style.display = "none";
// 	}	

// 	// When the user clicks anywhere outside of the modal, close it
// 	window.onclick = function(event) {
// 	    if (event.target == modal) {
// 	        modal.style.display = "none";
// 	    }
// 	}