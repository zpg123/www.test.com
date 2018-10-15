function sendmsgbutton(){
	if ($("#reg_mobile").hasClass("errinput") || $("#reg_mobile").val()=="") {
		alert("请输入手机号码");
		$("#reg_mobile").focus();
		return;
	}
	if ($("#checkcode").hasClass("errinput") || $("#checkcode").val()=="") {
		alert("请先输入正确图形验证码");
		$("#checkcode").focus();
		return;
	}
	
	var aj = $.ajax( {  
    url:'../sendsms.php',  
     data:{  phonenum : $("#reg_mobile").val()  },  
     type:'post',  
     cache:false,
     dataType:'json', 
     success:function(data) {  
         if($.trim(data) =="success" ){  
 
         }else{  

         }  
      },  
      error : function() {  

      }  
	});
	var test = {
       node:null,
       count:120,
       start:function(){
          if(this.count > 0){
			this.count--;
            this.node.value = this.count + "秒后可重新获取";
             var _this = this;
             setTimeout(function(){
                _this.start();
             },1000);
          }else{
             this.node.removeAttribute("disabled");
			 this.node.setAttribute("class","disabled");
             this.node.value=("再次发送手机验证码");
             this.count = 120;
          }
       },
       //初始化
       init:function(node){
          this.node = node;
          this.node.setAttribute("disabled",true);
		  this.node.setAttribute("class","disable");
          this.start();
       }
    };
    var btn = document.getElementById("sendmsg");      
    test.init(btn);
}