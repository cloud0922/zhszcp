<?php
namespace Home\Controller;
use Think\Controller;
class TCCController extends Controller {
	
	public function index()
	{
		$tid = 1;
		$tcc = D('teacher_course_class');
		$where['tid'] = $tid;
		$res = $tcc->field('course_id,course_name,classes_id,classes_name')->where($where)->select();
		//$this->ajaxReturn($res);
		//$this->assign('list',$res);
		$this->display();
	}
	public function get()
	{
		$tid = 1;
		$tcc = D('teacher_course_class');
		$where['tid'] = $tid;
		$res = $tcc->field('course_id,course_name,classes_id,classes_name')->where($where)->select();
		$this->ajaxReturn($res);
		
	}
	public function change()
	{
		$this->assign('v',2);
		$this->display();
	}
	
	public function add()
	{
		$this->assign('v',2);
		$this->display();
	}
	
	public function new_in()
	{
		$this->assign('v',2);
		$this->display();
	}
	public function roll_out()
	{
		$this->assign('v',2);
		$this->display();
	}
	public function update()
	{
		$this->assign('v',2);
		$this->display();
	}
	
	public function task()
	{
		$this->display();
	}
	
}