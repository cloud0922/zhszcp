<?php
namespace Home\Controller;
use Think\Controller;
class EvaluateController extends Controller {
	
	public function login()
	{
		$this->display();
	}
	public function teacher()
	{
		$p = M('x1_evaluate_plan');
		$where['status'] = 1;
		$res = $p->where($where)->select();
		$this->assign('pid',$res[0]['brief']);
		$this->assign('pname',$res[0]['name']);
		//echo $res[0]['brief'];
		//exit();
		//dump($res);
		//exit();
		$this->assign('t_id',1);
		$this->display();
	}
		public function teacher2()
	{
		$p = M('x1_evaluate_plan');
		$where['status'] = 1;
		$res = $p->where($where)->select();
		$this->assign('pid',$res[0]['brief']);
		$this->assign('pname',$res[0]['name']);
		$this->assign('t_id',1);
		$this->display();
	}
	public function getMenu($tid)
	{
		
		$t = M('x1_evaluate_task');
		$where['tid'] = $tid;
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
			->field('x1_evaluate_task.id,x1_evaluate_task.tid,x1_evaluate_task.sid,x_course.name,x_course.sl_id,x1_class.cid,x1_class.cname')->where($where)->select();
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
		//$result = "124";
		$this->ajaxReturn($result,'json');
	}
	public function start()
	{
		//dump($_GET);
		$sl_id = I('get.sl_id');
		//$cid = I('get.cid');
		$cid = 102;
		$index_page = I('get.indexp')? I('get.indexp'):1;
		//echo $index_page;
		//exit();
		$sname = I('get.sname');
		$cname = I('get.cname');
		$i = D('x1_evaluate_index');
		$where['sl_id'] = $sl_id;
		$where['appraiser'] = 2;
		$where['period'] = array(array('eq',3),array('eq',5),'or');
		
		$index = $i->field('id,name')->where($where)->select();
		$indexCount = count($index);
		
		$index = $i->field('id,name')->where($where)->order('id2 asc')->limit($index_page-1,1)->select();
		//dump($index);
		//exit();
		
		$where = array();
		$s = M('x1_student');
		$where['class_id'] = $cid;
		$where['type'] = 'QZ';
		//$stu = $s->field('sid,C1')->where($where)->select();
		$stu = $s->join('x1_evaluate_qiping ON x1_student.sid = x1_evaluate_qiping.sid')->field('x1_student.sid,C1,x1_evaluate_qiping.'.$index[0]['id'])->where($where)->select();
		//dump($stu);
		//exit();
		$sid_arr = array();
		foreach($stu as $key => $value)
		{
			$sid_arr[] = $value['sid'];
		}
		$sid_str = implode(',',$sid_arr);
		/*
		foreach($res as $key => $value)
		{
			$fields_arr[]= $value['id'];
		}
		$fields = implode(',',$fields_arr);*/
		
		
		$this->assign('stu',$stu);
		$this->assign('index',$index[0]['id']);
		$this->assign('indexname',$index[0]['name']);
		$this->assign('sids',$sid_str);
		$this->assign('cname',$cname);
		$this->assign('indexCount',$indexCount);
		$this->assign('curIndex',$index_page);
		
		//$next = $index_page+1 > 10?10:$index_page+1
		
		$this->assign('nextIndex',$index_page+1);
		$this->assign('lastIndex',$index_page-1);
		$this->assign('sl_id',$sl_id);
		$this->assign('cid',$cid);
		//dump($stu);
		//dump($index);
		//exit();
		$this->display();
	}
	
	public function QP()
	{
		//dump($_GET);
		$sl_id = I('get.sl_id');
		$cid = I('get.cid');
		$index_page = I('get.indexp')? I('get.indexp'):1;

		$sname = I('get.sname');
		$cname = I('get.cname');
		$pname = I('get.pname');
		$code = I('get.code');
		$i = D('x1_evaluate_index');
		$where['sl_id'] = $sl_id;
		$where['appraiser'] = 2;
		$where['period'] = array(array('eq',3),array('eq',5),'or');
		
		$index = $i->field('id,name')->where($where)->select();
		$indexCount = count($index);
		
		$index = $i->field('id,name')->where($where)->order('id2 asc')->limit($index_page-1,1)->select();
		//dump($index);
		//exit();
		
		$where = array();
		$s = M('x1_student');
		$where['class_id'] = intval($cid);
		$where['type'] = $code;
		//$stu = $s->field('sid,C1')->where($where)->select();
		$stu = $s->join('x1_evaluate_qiping ON x1_student.sid = x1_evaluate_qiping.sid')->field('x1_student.sid,C1,x1_evaluate_qiping.'.$index[0]['id'])->where($where)->select();
		//dump($stu);
		//exit();
		$sid_arr = array();
		foreach($stu as $key => $value)
		{
			$sid_arr[] = $value['sid'];
		}
		$sid_str = implode(',',$sid_arr);
		
		
		$this->assign('stu',$stu);
		$this->assign('index',$index[0]['id']);
		$this->assign('indexname',$index[0]['name']);
		$this->assign('sids',$sid_str);
		$this->assign('cname',$cname);
		$this->assign('sname',$sname);
		$this->assign('pname',$pname);
		$this->assign('code',$code);
		$this->assign('indexCount',$indexCount);
		$this->assign('curIndex',$index_page);
		
		
		$this->assign('nextIndex',$index_page+1);
		$this->assign('lastIndex',$index_page-1);
		$this->assign('sl_id',$sl_id);
		$this->assign('cid',$cid);

		$this->display();
	}
	
	public function QPsubmit()
	{
		$sids = I('post.sids');
		$arr_sids = explode(',',$sids);
		$index = I('post.index');
		$qp = M('x1_evaluate_qiping');
		$where['type'] = I('post.code');
		//dump($arr_sids);
		foreach($arr_sids as $key => $value)
		{
			$where['sid'] = $value;
			//$i = $index.'-'.$value;
			//echo $i;
			$qp_data[$index] = I('post.'.$index.'-'.$value);
			//echo $qp_data[$index];
			$qp->where($where)->save($qp_data);
			
		}
		$res = "success";
		$this->ajaxReturn($res);
	}
	
	public function selectcourse()
	{
		
		$this->display();
	}
	
	public function index()
	{
		$this->QZ();
		//$this->genFieldsTable();
		exit();
		$index = D('x1_evaluate_index');
		$where['appraiser'] = '家长';
		$where['period'] = array('LIKE','期中%');
		//$res = $index->field('id')->where('period = \'期中\' or period = \'期中和期末\' and appraiser = \'学生\'')->select();
		$res = $index->field('id')->where($where)->select();
		//dump($res);
		$str = '';
		foreach($res as $key => $value)
		{
			$str .= $value['id'].',';
		}
		print(substr($str,0,strlen($str)-1));
		exit();
		$index = D('x1_evaluate_index');
		$where = '';
		$p=getpage($index,$where,10);	
		$list=$index->where($where)->order('id2 asc')->select();
		$this->list=$list;
		$this->page=$p->show();
		$this->display();
	}
	
	public function genFieldsTable()
	{
		$this->genFields('YP','所有');	
		$this->genFields('YP','学生');
		$this->genFields('YP','老师');
		$this->genFields('YP','家长');
		
		$this->genFields('QZ','所有');
		$this->genFields('QZ','学生');
		$this->genFields('QZ','老师');
		$this->genFields('QZ','家长');
		
		$this->genFields('QM','所有');	
		$this->genFields('QM','学生');
		$this->genFields('QM','老师');
		$this->genFields('QM','家长');
		
		$this->genFields('B4QZ','学生');
		$this->genFields('B4QZ','老师');
		$this->genFields('B4QM','学生');
		$this->genFields('B4QM','老师');
		
	}
	public function genFields($type,$appraiser)
	{
		//x1_evaluate_fields_index结构：
		// id type appraiser fields count
		$f = D('x1_evaluate_fields_index');
		$index = D('x1_evaluate_index');
		if($type == 'YP')
		{
			if($appraiser == '所有')
			{
				$where['period'] = '月底';
				$res = $index->field('id')->where($where)->select();	
			}
			else 
			{
				$where['period'] = '月底';
				$where['appraiser'] = $appraiser;
				$res = $index->field('id')->where($where)->order('id2 asc')->select();
				
			}
		}
		else if($type == 'QZ')
		{
			if($appraiser == '所有')
			{
				$res = $index->field('id')->where('period = \'期中\' or period = \'期中和期末\'')->order('id2 asc')->select();
			}
			else
			{
				$where['period'] = array('LIKE','期中%');
				$where['appraiser'] = $appraiser;
				$res = $index->field('id')->where($where)->order('id2 asc')->select();
			}	
			
		}
		else if($type == 'QM')
		{
			if($appraiser == '所有')
			{
				$res = $index->field('id')->where('period = \'期末\' or period = \'期中和期末\'')->order('id2 asc')->select();
			}
			else
			{
				$where['period'] = array('LIKE','%期末');
				$where['appraiser'] = $appraiser;
				$res = $index->field('id')->where($where)->order('id2 asc')->select();
			}	
			
		}
		else			
		{
			if(strlen($type) == 2)
			{
				$where['sl_id'] = $type;
				if($appraiser == '所有')
				{
					$res = $index->field('id')->where($where)->order('id2 asc')->select();
				}
				else
				{
					$where['appraiser'] = $appraiser;
					$res = $index->field('id')->where($where)->order('id2 asc')->select();
				}
			}
			else
			{
				if(strlen($type)<4)
				{
					print("ERROR!");
					return;
				}
				$type2 = substr($type,0,2);
				$period = substr($type,2,2);
				$where['sl_id'] = $type2;
				if($period == 'QZ')
				{
					$where['period'] = array('LIKE','期中%');	
				}
				else
				{
					$where['period'] = array('LIKE','%期末');	
				}
				if($appraiser != '所有')
				{
						$where['appraiser'] = $appraiser;
				}
				$res = $index->field('id')->where($where)->order('id2 asc')->select();
			}
			
		}
		
		$str = '';
		$len = count($res);
		foreach($res as $key => $value)
		{
			$str .= $value['id'].',';
		}
		$fields = substr($str,0,strlen($str)-1);
		$data['fields'] = $fields;
		$data['type'] = $type;
		$data['appraiser'] = $appraiser;
		$data['count'] = $len;
		$f->add($data);	
		print("OK");
		return;
	}
	
	public function yueping()
	{
		$userType = "老师";
		$index = D('x1_evaluate_index');
		#$where['period'] = '月底';
		$where['period'] = 0;
		$where['appraiser'] = $userType;
		$where['id2'] = array( array('egt',17),array('elt',50));
		$res = $index->field('id,name,appraiser')->where($where)->select();
		$B2 = $res;
		
		$where['id2'] = array( array('egt',271),array('elt',274));
		$res = $index->field('id,name,appraiser')->where($where)->select();
		$B5 = $res;
		
		$this->assign('B2',$B2);
		$this->assign('B5',$B5);
		
		$this->display();
	}
	public function test()
	{
		$res = "ok";
		//$res = $_POST['C91-1'];
		$this->ajaxReturn($res);
		//return ();
		//echo json_encode($result);
	}
	
	public function QZ3()
	{
		$this->display();
	}
	public function QZ()
	{
		$index = D('x1_evaluate_index');
		$where['period'] = array(array('EQ',3),array('EQ',5),'OR');
		$where['appraiser'] = 2;
		$where['sl_id'] = 'B4';
		$res = $index->field('id,name,appraiser')->where($where)->order('id2 asc')->select();
		foreach($res as $key => $value)
		{
			$fields_arr[]= $value['id'];
		}
		$fields = implode(',',$fields_arr);
		$this->assign('list',$res);
		$this->assign('fields',$fields);
		$this->display();
	}
	public function QZ2()
	{
		$id = '';
		$f = D('x1_evaluate_fields_index');
		$where['type'] ='B4QZ';
		$where['appraiser'] = '老师';
		
		$res = $f->field('fields')->where($where)->select();
		$fields = $res[0]['fields'];
		//$fields_arr = explode(",",$fields);
		//$start = intval(substr($fields_arr[0],1));
		//$end = intval(substr($fields_arr[count($fields_arr)-1],1));
		
		$where='';

		$index = D('x1_evaluate_index');
		//$where['id2'] = array( array('egt',$start),array('elt',$end));
		$where['id'] = array('in',$fields);
		$res = $index->field('id,name,appraiser')->where($where)->order('id2 asc')->select();
		
		
		$this->assign('list',$res);
		$this->assign('fields',$fields);
		$this->assign('test','qqq');
		
		$this->display();
		
	}
	public function submit()
	{
		$a2 = D('x1_evaluate_behaiver');
		//$data = $a2->create(I('post'),1);
		dump($_POST);
		//dump(I('post'));
		exit();
		if(!$data)
		{
			exit($a2->getError());
		}
		else
		{
			echo "OK";
			$a2->add($data);
			exit();
		}
		
		for($i=17;$i<=50;$i++)
		{
			$index = "valueC".$i;
			$index2 = "C".$i;
			$A2[$index2] = (I('post.'.$index)=='') ? 0:intval(I('post.'.$index));
		}
		dump($A2);
		
	}
	
	public function unfinished()
	{
		$index = D('x1_evaluate_index');
		$where['status'] = 0;
		$p=getpage($index,$where,10);	
		$list=$index->field('id,name')->where($where)->order('id2 asc')->select();
		$this->list=$list;
		$this->page=$p->show();
		$this->display();
	}
	
	public function finishing()
	{
		$index = D('x1_evaluate_index');
		$where['status'] = 1;
		$p=getpage($index,$where,10);	
		$list=$index->field('id,name')->where($where)->order('id2 asc')->select();
		$this->list=$list;
		$this->page=$p->show();
		$this->display();
	}
	
	public function finished()
	{
		$index = D('x1_evaluate_index');
		$where['status'] = 2;
		$p=getpage($index,$where,10);	
		$list=$index->field('id,name')->where($where)->order('id2 asc')->select();
		$this->list=$list;
		$this->page=$p->show();
		$this->display();
	}
	public function change()
	{
		$this->assign('v',2);
		$this->display();
	}
	public function gen()
	{
		
		$index = D('x1_evaluate_index');
		$where = '';
		$p=getpage($index,$where,10);	
		$list=$index->field('id2',true)->where($where)->order('id2 asc')->select();
		$this->list=$list;
		$this->page=$p->show();
		$this->display();
		dump($p);

	}
	
	
	public function getIndex($start,$end)
	{
		$s = substr($start,1);
		$e = substr($end,1);
		$index = D("x1_evaluate_index");
		$condition['id2'] = array( array('egt',$s),array('elt',$e));
		$res = $index->field('id,name,sl_id')->where($condition)->select();
		
		return $res;
	}
	
	
}