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

<body class="easyui-layout">
    <div data-options="region:'north',split:true" style="height:100px;"></div>
    <div data-options="region:'south',split:true" style="height:100px;"></div>
    <div data-options="region:'east',split:true" style="width:100px;"></div>
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
				//var sid = 
				//d.add(4,1,'语文','#');
				$.ajaxSettings.async = false;
				$.post("<?php echo U('Index/getMenu2');?>",{tid:2},function (data) {
				for(var i=0;i< data.length;i++)
				{
					
					var obj = data[i];
					//d.add(nid,1,data[i]['name'],"<?php echo U('Evaluate/selectcourse?user_id=123');?>",'','center');
					var sid = obj[0]['sid'];
					d.add(start+i,1,obj[0]['name'],"<?php echo U('Evaluate/selectcourse?user_id=123');?>",'','center');
					//nid = nid+1;
					for(var j=0;j<obj.length;j++)
					{
						
						if(obj[j]['sid'] == sid)
							{
								d.add(nid,start+i,obj[j]['cname'],"<?php echo U('Evaluate/selectcourse?user_id=123');?>",'','center');
								nid = nid+1;
							}
					}
					
				}
				
							},'json');
				$.ajaxSettings.async = true;
				//d.add(2,0,'Node 2','example01.html');
				//d.add(3,1,'Node 1.1','example01.html');
				//d.add(4,0,'Node 3','example01.html');
				//d.add(5,3,'Node 1.1.1','example01.html');
				//d.add(6,5,'Node 1.1.1.1','example01.html');
				//d.add(7,0,'Node 4','example01.html');
				//d.add(8,1,'Node 1.2','example01.html');
				//d.add(9,0,'My Pictures','example01.html','Pictures I\'ve taken over the years','','','img/imgfolder.gif');
				//d.add(10,9,'The trip to Iceland','example01.html','Pictures of Gullfoss and Geysir');
				//d.add(11,9,'Mom\'s birthday','example01.html');
				//d.add(12,0,'Recycle Bin','example01.html','','','img/trash.gif');

				document.write(d);

				//-->
			</script>
		</div>
            
        </div>
    </div>	
	</div>
    <div data-options="region:'center',title:'center title'" style="padding:1px;background:#eee;">
	
		<iframe id="center" name="center" src="" scrolling="auto" frameborder="0" style="width:100%;height:99%;">
		
		</iframe>
	</div>
	<script>
</script>
</body>

</html>