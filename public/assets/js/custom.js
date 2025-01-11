$( document ).ready(function() {
    var arr = [1,2,3];
	var a = arr.map((d) => {
		return d*2;
	});
	console.log(a);
	var b = arr.filter((d) => {
		return d > 2;
	});
	console.log(b);
	var c = arr.reduce((d1, d2) => {
		return d1+d2;
	});
	console.log(c);
});