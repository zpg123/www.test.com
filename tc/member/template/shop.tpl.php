<?php include mymps_tpl('inc_header');?>
<link rel="Stylesheet" type="text/css" href="template/css/new.dialog.css" />
<link rel="stylesheet" type="text/css" href="template/css/new.my.css" />
<script language="javascript">
var current_domain = '<?php echo $mymps_global[SiteUrl]?>';
</script>
<script language="javascript" src="template/javascript.js"></script>
<script type="text/javascript" src="../template/global/messagebox.js"></script>
</head>
<body class="<?php echo $mymps_global['cfg_tpl_dir']; ?>">
<div class="container">
<?php include mymps_tpl('inc_head');?>
<div id="main" class="main section-setting">
        <div class="clearfix main-inner">
            <div class="content">
                <div class="clearfix content-inner">
                    <div class="content-main">
                        <div class="content-main-inner">
                            <div class="pwrap setting-userinfo">
                                <div class="phead"><div class="phead-inner"><div class="phead-inner">
                                    <h3 class="ptitle"><span>商家店铺资料 <?php if($if_corp == 1){?><a target="_blank" style="font-size:12px; font-weight:100;" href="<?php echo $mysite;?>">查看我的网站</a><? }?></span></h3>
                                </div></div></div>
                                <div class="pbody">
                                    <div class="cleafix pagetab-wrap">
                                        <ul class="pagetab">
                                            <li><a href="?m=shop&type=<?php echo $type; ?>&ac=base" <?php if($ac == 'base'){?>class="current"<?php }?>><span><?php echo $if_corp != 1 ? '申请开通网上店铺' : '基本信息修改'; ?></span></a></li>
											<?php if($if_corp == 1){?>
                                            <li><a href="?m=shop&type=corp&ac=template" <?php if($ac == 'contact'){?>class="current"<?php }?>><span>店铺模板修改</span></a></li>
											<?php }?>
                                        </ul>
                                    </div>
									
									<div id="msg_success"></div>
									<div id="msg_error"></div>
									<div id="msg_alert"></div>
                                    
                                    <form action="?m=shop" method="post" name="form1">
                                    <div class="formgroup">
                                        <div class="formrow">
                                            <h3 class="label"><label>商户名称</label></h3>
                                            <div class="form-enter">
                                                <input type="text" name="tname" class="text" value="<?php echo $row['tname']; ?>" <? if($row['com_certify'] == 1) echo 'readonly';?>/> <?php if($row['com_certify'] == 1){?><font style="font-size:10px!important; color:red">通过营业执照认证后，不能再修改</font><?php }?>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="formrow">
                                            <h3 class="label">所属类别</h3>
                                            <div class="form-enter">
                                               <?=$get_member_cat?>
                                            </div>
                                        </div>
                                        
                                        <div class="formrow">
                                            <h3 class="label">所属地区 </h3>
                                            <div class="form-enter">
                                                <select name="areaid">
                                                <?=cat_list('area',0,$row[areaid])?>
                                                </select></div>
                                        </div>
                                        
                                        <div class="formrow">
                                            <h3 class="label">详细地址</h3>
                                            <div class="form-enter">     
												<input type="text" class="text" name="address" value="<?php echo $row['address']?>" /></div>
                                        </div>
                                        
                                        <div class="formrow">
                                            <h3 class="label">乘车路线</h3>
                                            <div class="form-enter">     
											<textarea name="busway" style="width:300px; height:100px"><?php echo $row['busway']; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="formrow">
                                            <h3 class="label">地理坐标</h3>
                                            <div class="form-enter">     
											<input id='mappoint' name='mappoint' type='text' value="<?=$row['mappoint']?>" class="text"> <input type="button" class="gray mini" value="我要标注" onClick="javascript:setbg('地图标注',500,250,'../map.php?action=markpoint&width=500&height=250&p=<?=$row['mappoint']?>')"/>
                                            </div>
                                        </div>
                                        
                                        <div class="formrow">
                                        <h3 class="label">商户介绍</h3>
                                        <?php echo $acontent; ?>
                                        </div>
                                        
                                        <div class="formrow">
                                            <h3 class="label">网站地址</h3>
                                            <div class="form-enter">     
												<input type="text" class="text" name="web" value="<?php echo $row['web']?>" /></div>
                                        </div>

                                        <div class="formrow formrow-action">
                                            <span class="minbtn-wrap"><span class="btn"><input type="submit" value="填写好了，我要提交<?php echo $if_corp == 1 ? '保存' : '申请'; ?>" class="button" name="shop_submit" /></span></span>
                                        </div>
                                    </div>
                                    </form>
                                    
                                </div>
                                <div class="pfoot"><p><b>-</b></p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include mymps_tpl('inc_sidebar');?>
        </div>
    </div>
<?php include mymps_tpl('inc_foot');?>
</div>
</body>
</html>