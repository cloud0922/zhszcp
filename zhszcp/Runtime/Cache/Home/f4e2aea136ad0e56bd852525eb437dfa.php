<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title></title>  
<style type="text/css">
*{margin:0;padding:0;list-style-type:none;}
a,img{border:0;}
body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}
p{margin:20px 0 10px 0;}
</style>

<script src="<?php echo (__JS__); ?>jquery-1.5.1.js" type="text/javascript"></script>
<script src="<?php echo (__JS__); ?>jquery.raty.js" type="text/javascript"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
<!--<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script> -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
	<h2>行为习惯测评结果</h2>
	<p>测评时间：</p>                              
	<table class="table table-hover">
		<thead>
			<tr>
				<th>测评指标</th>
				<th>测评结果</th>
				<th>测评人</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
					<td><?php echo ($vo["item"]); ?></td>
					<td><div id="star<?php echo ($vo["index"]); ?>"></div><div id="result<?php echo ($vo["index"]); ?>"><input type="hidden" name="value<?php echo ($vo["index"]); ?>" id="value<?php echo ($vo["index"]); ?>" value="<?php echo ($vo["value"]); ?>" /></div></td>
				</tr><?php endforeach; endif; ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
//rat('star0','result1',10);
all(17,50);
function rat(star,result,s){

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
		showHalf: true,
		number:4,
		//readonly:true
		target: result,
		targetKeep : true,//targetKeep 属性设置为true，用户的选择值才会被保持在目标DIV中，否则只是鼠标悬停时有值，而鼠标离开后这个值就会消失
		score:s,
		//score:$("#value").val(),
		readOnly:true
		/*click: function (score, evt) {
			//第一种方式：直接取值
			//alert('你的评分是'+score*m+'分');
		}*/
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
function all(start,end)
{
	for(var i=start;i<=end;i++)
	{
		var star = "starC" + i;
		var result = "resultC" + i;
		var value = "#" + "valueC" + i;
		var s = $(value).val();
		rat(star,result,s);
	}
}
</script>

<div style="text-align:center;clear:both;">
<script src="/gg_bd_ad_720x90.js" type="text/javascript"></script>
<script src="/follow.js" type="text/javascript"></script>
</div>
</body>
</html>