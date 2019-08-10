$.urlParam = function(name){
	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
	if (results==null) {
		return null;
	}
	return decodeURI(results[1]) || 0;
}

function htmlEncode ( str ) {
	var ele = document.createElement('span');
	ele.appendChild( document.createTextNode( str ) );
	return ele.innerHTML;
}

function htmlDecode ( str ) {
	var ele = document.createElement('span');
	ele.innerHTML = str;
	return ele.textContent || ele.innerText;
}