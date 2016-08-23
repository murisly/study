
function fab(a) {
	if (a <= 0) {
		return 0;
	}

	if (a == 1) {
		return 1;
	}

	var ret = fab(a-1) + fab(a-2);
	//document.write(ret + "<br/>");
	return ret;
}

function add(a, b) {
	return a + b;
}

function fab_show(n) {
	alert(fab(n));
}

function add_show(a, b) {
	alert(add(a, b));
}

//salert(fab(5));