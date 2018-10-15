<?php include mymps_tpl('inc_header');?>
<link rel="stylesheet" type="text/css" href="template/css/new.my.css" />
<link rel="stylesheet" type="text/css" href="template/css/new.exchange.css" />
<script language="javascript" src="template/javascript.js"></script>
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
                            
                            <div class="pwrap">
                                <div class="phead"><div class="phead-inner"><div class="phead-inner">
                                    <h3 class="ptitle"><span>金币充值</span></h3>
                                </div></div></div>
                                <div class="pbody">

                                    <div class="clearfix pagetab-wrap">
                                        <ul class="pagetab">
                                            <li><a href="?m=pay&ac=pay" <?php if($ac == 'pay') echo 'class="current"'; ?>><span>金币充值</span></a></li>
                                            <li><a href="?m=pay&ac=record" <?php if($ac == 'record') echo 'class="current"'; ?>><span>充值明细</span></a></li>
                                            <li><a href="?m=pay&ac=use" <?php if($ac == 'user') echo 'class="current"'; ?>><span>消费记录</span></a></li>
                                        </ul>
                                    </div>

                                    <!--<div class="clearfix topuplogcaption">
                                        <div class="topuplog-inquire">
                                        <form action="?m=pay&ac=record" method="get">
                                        <input name="m" value="pay" type="hidden">
                                        <input name="ac" value="record" type="hidden">
                                            <div class="topuplog-inquire-form">
                                            	起始日期
                                                 <input name="begindate" id="datepicker1" type="text" class="text" value="<?php echo $begindate; ?>"/>
                                                截止日期
                                                <input name="enddate" id="datepicker2" type="text" class="text" value="<?php echo $enddate; ?>" />
                                            </div>
                                            <span class="minbtn-wrap"><span class="btn"><input class="button" type="submit" value="查询" /></span></span>
                                        </form>
                                        </div>
                                    </div>-->
                                    
                                    <div id="msg_success"></div>
<div id="msg_error"></div>
<div id="msg_alert"></div>
                                    
                                    <form method="post" action="?m=<?=$m?>&ac=<?=$ac?>&page=<?=$page?>">
                                    <div class="datatablewrap">
                                        <table class="datatable">
                                                <thead>
                                                    <tr>
                                                         <td width="130">编号</td>
                                                        <td>充值金币</td>
                                                        <td>备注</td>
                                                        <td>充值IP</td>
                                                        <td width="180">充值时间</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                if($rows_num > 0){
                                                $i=1; 
                                                foreach($record as $record){
                                                ?>
                                                <tr <?php if($i%2 == 0) echo 'class="row-even"'?>>
                                                     <td><?php echo $record['orderid']; ?></td>
                                                        <td><?php echo $record['money']; ?>个</td>
                                                        <td><?php echo in_array($record['paybz'],array('支付成功','支付完成'))? '<font color=green>'.$record['paybz'].'</font>' : $record['paybz']; ?></td>
                                                        <td><?php echo $record['payip'] == 'wap'?'手机版充值':$record['payip']; ?></td>
                                                        <td><?php echo GetTime($record['posttime']); ?></td>
                                                </tr>
                                                <?php 
                                                    $i=$i+1;
                                                 }
                                                } else {
                                                ?>
                                               <tr>
                                                    <td height="15" colspan="10">
                                                        <div class="nodata">没有记录</div>
                                                    </td>
                                                </tr>
                                                <?}?>
                                                </tbody>
                                            </table>
                                        <div class="clearfix datacontrol">
                                            <div class="dataaction">
                                                </div>
                                            <div class="pagination"><?php echo page2(); ?></div>
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