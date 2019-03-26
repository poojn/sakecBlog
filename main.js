// alert(1);
function getSize() {
	var w = document.documentElement.clientWidth;
	var h = document.documentElement.clientHeight;
	        
	// put the result into a h1 tag
	 document.getElementById('w').innerHTML = "W: " + w;
	 document.getElementById('h').innerHTML = "H: " + h;
}

function goHome() {
	window.open("http://localhost/BLOG/","_self")
}

function navHam() {
    var x = document.getElementsByTagName("nav")[0];
    if (x.className === "nav") {
        x.className = "ham";
    } else {
        x.className = "nav";
    }

}

function filterBlogs() {
	
	var filterBlogs = '';
	var cats = 'cats=';
	var sortBy = 'sortBy=';
	var readTime = 'readTime='

	var tech = document.getElementById("technology");
	var ent = document.getElementById("entertainment");
	var lit = document.getElementById("literature");
	var pol = document.getElementById("politics");
	var soc = document.getElementById("social");
	var spo = document.getElementById("sports");

	sortBy = sortBy + document.getElementById("sort-select").getElementsByTagName("select")[0].value;
	readTime = readTime + document.getElementById("reading-time").getElementsByTagName("span")[0].getElementsByTagName("input")[0].value;

	if(tech.checked) {
		cats = cats + "+" + tech.value;
	}
	if(ent.checked) {
		cats = cats + "+" + ent.value;
	}
	if(lit.checked) {
		cats = cats + "+" + lit.value;
	}
	if(pol.checked) {
		cats = cats + "+" + pol.value;
	}
	if(soc.checked) {
		cats = cats + "+" + soc.value;
	}
	if(spo.checked) {
		cats = cats + "+" + spo.value;
	}


	filterBlogs = filterBlogs + "&" + cats + "&" + sortBy + "&" + readTime;
	// alert(filterBlogs);
    var xmlhttpFilter = new XMLHttpRequest();
    xmlhttpFilter.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // document.getElementsByClassName("slab")[0].innerHTML = this.responseText;
            document.getElementById("displayBlogs").innerHTML = this.responseText;
        }
    };
    xmlhttpFilter.open("GET", "getBlogs.php?" + filterBlogs, true);
    xmlhttpFilter.send();
}

/* function readBlog(bid) {
 	// var url = window.location.href;
 	alert(bid);
 	var url = "http://localhost/BLOG/readBlog.php?bid=" + bid;
 	// window.open("readBlog.php?bid=" + bid, "_self");
 	alert(url);
 	var win = window.open(url, '_blank');
 	win.focus();
} */


function likeToggle(bid, toggle) {
	// var dislike = document.getElementById("dislike");
	// var like = document.getElementById("like");
	// if (like.style.display == "none") {
	// 	dislike.style.display = "none";
	// 	like.style.display = "inline-block";
	// }
	// else {		
	// 	dislike.style.display = "inline-block";
	// 	like.style.display = "none";
	// }
	var xmlhttpVote = new XMLHttpRequest();
    xmlhttpVote.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // document.getElementsByClassName("slab")[0].innerHTML = this.responseText;
            document.getElementById("blog-vote").innerHTML = this.responseText;
        }
    };
    xmlhttpVote.open("GET", "voteBlog.php?bid=" + bid + "&toggle=" + toggle, true);
    xmlhttpVote.send();
	
}