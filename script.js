
function myFunction() {
	var button = document.getElementById('button');

	var x = document.getElementById("comments");
	if (x.style.display === "none") {
		button.innerHTML = 'Hide comments'
	    x.style.display = "block";
	} else {
		button.innerHTML = 'Show comments'

	    x.style.display = "none";
	}
}

