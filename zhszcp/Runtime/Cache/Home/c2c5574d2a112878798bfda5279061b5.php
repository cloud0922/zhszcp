<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="巴中棠外小学部,综合素质测评">
	<meta name="description" content="easyui help you build your web page easily!">
	<title>巴中棠外综合素质测评系统</title>
	<link rel="stylesheet" type="text/css" href="<?php echo (__EASYUI__); ?>themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo (__EASYUI__); ?>themes/icon.css">
	<script type="text/javascript" src="<?php echo (__EASYUI__); ?>jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo (__EASYUI__); ?>jquery.easyui.min.js"></script>
	<link rel="StyleSheet" href="<?php echo (__CSS__); ?>dtree.css" type="text/css" />
	<script type="text/javascript" src="<?php echo (__JS__); ?>dtree.js"></script>

</head>

<body class="easyui-layout" style="height:100%">
    <div data-options="region:'north',split:true" style="height:100px;"></div>
    <div data-options="region:'south',split:true" style="height:100px;"></div>
    <!--<div data-options="region:'east',split:true" style="width:100px;"></div> -->
    <!-- <div data-options="region:'west',title:'West',split:true" style="width:200px;"> -->
	<div class="wu-sidebar" data-options="region:'west',split:true,border:true,title:'导航菜单'" style="width:200px;"> 
    	<div class="easyui-accordion" data-options="border:false,fit:true">
		<div class="dtree">
			<script type="text/javascript">
				<!--
				d = new dTree('d');
				//function(id, pid, name, url, title, target, icon, iconOpen, open)
				d.add(0,-1,'');
				d.add(1,0,'学科评价','#');
				d.add(2,0,'课程申报',"<?php echo U('Evaluate/selectcourse?user_id=123');?>",'','center');
				d.add(3,0,'修改信息',"<?php echo U('Index/changeInfo?user_id=123');?>",'更改个人信息','center');
				d.add(4,2,'查看',"<?php echo U('TCC/index?tid=123');?>",'','center');
				d.add(5,2,'新增',"<?php echo U('Index/selectcourse?user_id=123');?>",'','center');
				var nid = 6;
				var start = 100;
				var tt = "<?php echo ($t_id); ?>";
				var pid = "<?php echo ($pid); ?>";
				var pname = "<?php echo ($pname); ?>";
				//var sid = 
				//d.add(4,1,'语文','#');
				$.ajaxSettings.async = false;
				$.post("<?php echo U('Evaluate/getMenu');?>",{tid:tt},function (data) {
				//alert(data);
				for(var i=0;i< data.length;i++)
				{
					
					var obj = data[i];
					//d.add(nid,1,data[i]['name'],"<?php echo U('Evaluate/selectcourse?user_id=123');?>",'','center');
					var sid = obj[0]['sid'];
					d.add(start+i,1,obj[0]['name']);
					//nid = nid+1;
					for(var j=0;j<obj.length;j++)
					{
						
						if(obj[j]['sid'] == sid)
							{
								d.add(nid,start+i,obj[j]['cname'],"<?php echo U('Evaluate/QP');?>?sl_id="+obj[j]['sl_id']+"&cid="+obj[j]['cid']+"&sname="+obj[j]['name']+"&cname="+obj[j]['cname']+"&code="+pid+"&pname="+pname,'','center');
								nid = nid+1;
							}
					}
					
				}
				
							},'json');
				$.ajaxSettings.async = true;
				document.write(d);

				//-->
			</script>
		</div>
            
        </div>
    </div>	
	</div>
    <div data-options="region:'center'" style="padding:1px;background:#eee;">
	
		<iframe id="center" name="center" src="" scrolling="auto" frameborder="0" style="width:100%;height:100%;">
		
		</iframe>
	</div>
	<script>
</script>
</body>

</html>