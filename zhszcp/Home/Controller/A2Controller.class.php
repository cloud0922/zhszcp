<?php
namespace Home\Controller;
use Think\Controller;
class A2Controller extends Controller {
	public function index()
	{
		$start = 'C17';
		$end = 'C50';
		$items = $this->getIndexName($start,$end);
		
		$a2 = D("x1_evaluate_behaiver");
		//$condition['sid'] = $sid; 
		$condition['sid'] = 1; 
		$res = $a2->field('id,sid,term,date',true)->where($condition)->select();
		$values = $res[0];
		//dump($items);
		//exit();
		$count = count($items);
		for($i=0;$i<$count;$i++)
		{
			$temp = substr($start,1) + $i;
			$v_index = 'C'.$temp;
			
			$list[$i]['index'] = $v_index;
			$list[$i]['item'] = '【'.$v_index.'】'.$items[$i]['name'];
			$list[$i]['value'] = $values[$v_index];
			//echo $v_index;
		}
		
		$temp = D("x1_evaluate_first_level");
		$rr = $temp->select();

		$this->assign('list',$list);
		$this->display();
	}
	
	public function change()
	{
		$this->assign('v',2);
		$this->display();
	}
	public function get($sid)
	{
		
		return $values;
	}
	public function getIndexName($start,$end)
	{
		$s = substr($start,1);
		$e = substr($end,1);
		$index = D("x1_evaluate_index");
		$condition['id2'] = array( array('egt',$s),array('elt',$e));
		$res = $index->field('name')->where($condition)->select();
		
		return $res;
	}
	
}