<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
   
	public function index2()
	{
		$this->assign('uid',2);
		$this->display();
	}
	public function test()
	{
		dump($_POST);
		$this->assign('uid',2);
		$this->display();
	}
	public function teacher()
	{
		$this->assign('uid',2);
		$this->display();
	}
	public function student()
	{
		$this->assign('uid',2);
		$this->display();
	}
	
	
	public function getAclass()
	{
		dump($_GET);
		$this->assign('uid',2);
		$this->display();
	}
	
	public function selectcourse()
	{
		//dump($_GET);
		//$this->assign('uid',2);
		$this->display();
	}
	
	
	
	public function getCourse($tid)
	{
		
		$m = D('teacher_course_class');
		$where['tid'] = $tid;
		$res = $m->where($where)->select();
		
		//$area_option="<li value=0>请选择</option><br>";
		foreach($res as $row)
		{
			$area_option.="<li value=".$row['course_id'].">".$row['course_id']."</li>";
			
		}
		
		$this->ajaxReturn($area_option);
	}
	public function getMenu($tid)
	{
		
		$m = D('teacher_course_class');
		$where['tid'] = $tid;
		$res = $m->field('course_name,classes_id,sl_id,classes_name')->where($where)->select();
		
		$this->ajaxReturn($res,'json');
	}
	
	public function getMenu2()
	{
		
		$t = M('x1_evaluate_task');
		$where['tid'] = 2;
		/*$r = $t->join('x_course ON x1_evaluate_task.sid = x_course.id')
		->join('x1_class ON x1_evaluate_task.cid = x1_class.cid')
		->field('x1_evaluate_task.id,x1_evaluate_task.tid,x_course.name,x_course.sl_id,x1_class.cname')->where()->select();*/
		
		$result = array();
		$res = $t->group('sid')->where($where)->select();
		//$r['sid']
		foreach($res as $r)
		{
			$where['sid'] = $r['sid'];
			$r2 = $t->join('x_course ON x1_evaluate_task.sid = x_course.id')->join('x1_class ON x1_evaluate_task.cid = x1_class.cid')
			->field('x1_evaluate_task.id,x1_evaluate_task.tid,x1_evaluate_task.sid,x_course.name,x_course.sl_id,x1_class.cname')->where($where)->select();
			array_push($result,$r2);
			/*foreach($r2 as $rr)
			{
				$result[]['sid'] = $rr['sid'];
				$result[]['sid'] = $rr['sid'];
				$result[]['sid'] = $rr['sid'];
				array_push($result,$rr);
			}*/
			
			
		}
		//dump($result);
		//dump($res);
		//exit();
		$this->ajaxReturn($result,'json');
	}
	
	
	public function changeInfo()
	{
		dump($_GET);
		dump($_POST);
		//$this->assign('v',2);
		$this->display();
	}
	public function menu()
	{
		$this->assign('tid',1);
		$this->display();
	}
	public function menu2()
	{
		$m = D('teacher_course_class');
		//$where['tid'] = intval($_POST['id']);
		$where['tid'] = 1;
		
		$res = $m->where($where)->select();
		$result = array();
		/*while($row = mysql_fetch_array($rs)){
			
			$node['id'] = $row['course_id'];
			$node['text'] = $row['classes_id'];
			//$node['state'] = has_child($row['id']) ? 'closed' : 'open';
			array_push($result,$node);
			}*/
		

		//dump($res);
		//exit();
		$node = array();
		$node['id'] = 123;
		$node['text'] = 'test.'.$_POST['id'];
		$node['state'] ='open';
		array_push($result,$node);
	
		$this->ajaxReturn($result);
		//echo intval($_POST['id']);
	}
	
}