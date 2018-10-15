function sendmsgbutton(){
	if ($("#mobile").val()=="") {
		alert("请输入手机号码");
		$("#mobile").focus();
		return;
	}
	
	alert("手机验证码接口在后台配置后可正常使用");
	return;
}