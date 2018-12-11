<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>jQuery星级评分插件DEMO演示</title>  
<style type="text/css">
*{margin:0;padding:0;list-style-type:none;}
a,img{border:0;}
body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}
p{margin:20px 0 10px 0;}
</style>

<script src="<?php echo (__JS__); ?>jquery-1.5.1.js" type="text/javascript"></script>
<script src="<?php echo (__JS__); ?>jquery.raty.js" type="text/javascript"></script>

</head>

<body>

<div style="width:400px;margin:50px auto;">
	<p style="font-size:20px">请给出你的评分(百分制)：</p>
	<div id="star1"></div>
	<div id="result1"></div>
	<input type="hidden" name="test" id="test" value="<?php echo ($v); ?>" />
	<p style="font-size:20px">请给出你的评分(十分制)：</p>
	<div id="star2"></div>
	<div id="result2"></div>
</div>

<script type="text/javascript">
rat('star1','result1',10);
rat('star2','result2',1);
function rat(star,result,m){

	star= '#' + star;
	result= '#' + result;
	$(result).hide();//将结果DIV隐藏
	$(star).raty({
		hints: ['需努力','合格', '良好', '优秀'],
		path: "/zhszcp/Common/Common/images",
		starOff: 'star-off-big.png',
		starOn: 'star-on-big.png',
		size: 24,
		start: 40,
		number:4,
		score:$("#test").val(),
		showHalf: true,
		target: result,
		targetKeep : true,//targetKeep 属性设置为true，用户的选择值才会被保持在目标DIV中，否则只是鼠标悬停时有值，而鼠标离开后这个值就会消失	
		click: function (score, evt) {
			//第一种方式：直接取值
			//alert('你的评分是'+score*m+'分');
		}
	});
	

	//第二种方式可以设置一个隐蔽的HTML元素来保存用户的选择值，然后可以在脚本里面通过jQuery选中这个元素来处理该值。 弹出结果
	/*var text = $(result).text();
	$('img').click(function () {
		if ($(result).text() != text) {
			alert('你的评分是'+$(result).text()+'分');
			//alert(result);
			return;
		}
	});*/
}
</script>

<div style="text-align:center;clear:both;">
<script src="/gg_bd_ad_720x90.js" type="text/javascript"></script>
<script src="/follow.js" type="text/javascript"></script>
</div>
</body>
</html>