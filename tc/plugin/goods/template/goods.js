function showtab(id)
{
	$("li[name='s1']").attr('class','');
	$("#s1_"+id).attr('class','selected');
	$("#desc>ul").hide();
	$("#"+id).show();
}