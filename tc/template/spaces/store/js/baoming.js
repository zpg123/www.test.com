<!--
$().ready(function() {
$('form#bmform').checkForm(1);
});
var CusCheckForm = function()
{
var tel = $("input[name='tel']");
var mbl = $("input[name='mobile']");
if(tel.val() == "" && mbl.val() == "")
{
$("span#mbltips").addClass("no");
$("span#mbltips").html("固定电话和手机号码必须填写一个");
return false;
}
else return true;
}
//-->