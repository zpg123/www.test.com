ar url = '/../javascript.php?part=cats_js';
$.get(url,function(data){
	$('#cats_js').html(data);
});
