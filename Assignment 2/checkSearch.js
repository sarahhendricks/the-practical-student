function checkSearch(form) {
	var searchtext = form.searchtext.value;
	searchtext = searchtext.replace(/^\s+|\s+$/g,'');
	if (searchtext.length == 0) {
		alert("Please enter something to search for in the textbox");
		return false;
	} else {
		alert("We are searching for " + searchtext);
	}
}