function sendmsgbutton(){
	if ($("#mobile").val()=="") {
		alert("请输入手机号码");
		$("#mobile").focus();
		return;
	}
	if ($("#checkcode").val()=="") {
		alert("请先输入正确图形验证码");
		$("#checkcode").focus();
		return;
	}
	
	alert("手机验证码接口在后台配置后可正常使用");
	return;
}