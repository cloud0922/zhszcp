<?php
namespace Home\Controller;
use Think\Controller;
class StudentController extends Controller {
	public function index()
	{
		$this->assign('v',2);
		$this->display();
	}

	public function change()
	{
		$this->assign('v',2);
		$this->display();
	}
	
	public function add()
	{
		
		$this->assign('class_id',102);
		$this->assign('term_id','201820191');
		$this->display();
	}
	
	public function addsubmit()
	{
		//$s = $_POST;
		//$this->ajaxReturn($s);
		//exit();
		
		
		$u_data['name'] = I('post.C1');
		$u_data['type'] = 1;
		$u_data['type_name'] = '学生';
		$u_data['password'] = md5('123456');
		M()->startTrans();
		$res = M('x1_user')->add($u_data);
		if(!empty($res))
		{
			$s_data = $_POST;
			$s_data['sid'] = $res;
			$s_data['class_id'] = I('post.class_id');
			$s_data['term_id'] = I('post.term_id');
			$s_data['C16'] = I('post.C16');
			$res2 = M('x1_student')->add($s_data);
			
		}
		if(!empty($res) && !empty($res2))
		{
			$q = M('x1_evaluate_qiping');
			$q_data['sid'] = $res;
			$q_data['term_id'] = I('post.term_id');
			$res3 = $q_data['type'] = 'QZ';
			$q->add($q_data);
			$q_data['type'] = 'QM';
			$res4 = $q->add($q_data);
			
			$y = M('x1_evaluate_yueping');
			$y_data['sid'] = $res;
			$y_data['term_id'] = I('post.term_id');
		    $y_data['type'] = 'YP1';
			$res5 = $y->add($y_data);
			
			$y_data['type'] = 'YP2';
			$res6 = $y->add($y_data);
			
			$y_data['type'] = 'YP3';
			$res7 = $y->add($y_data);
		}
		if(!empty($res) && !empty($res2)&& !empty($res3)&& !empty($res4)&& !empty($res5)&& !empty($res6)&& !empty($res7))
		{
			M()->commit();
			$status = 'Submit Success!';
			$this->ajaxReturn($status);
		}
		else
		{
			M()->rollback();
			$status = 'Submit Failed!';
			$this->ajaxReturn($status);
		}
		
		
		
	}
	public function myUpload()
	{
		$imgstr = I('post.img');
		$term_id = I('post.term');
		$time = time();
		
		//$name = $term_id.'.png';
		$path = 'Uploads/'.$time.'.png';
		$imgdata = substr($imgstr,strpos($imgstr,",") + 1);
		$decodedData = base64_decode($imgdata);
		file_put_contents($path,$decodedData );
		$this->ajaxReturn($path);
		
	}
	
	
	public function upload()
	{
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'png');// 设置附件上传类型
		$upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		// 上传文件 
		$info   =   $upload->upload();
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{// 上传成功
			
			//dump($info['file']);
			//exit();
			$picname=$info['file']['savename'];
			$picpath='./Uploads/'.$info['file']['savepath'];
			
			$picfile=$picpath.$picname;
			
			return $picfile;
		}
	}
	
	
	public function new_in()
	{
		$this->assign('v',2);
		$this->display();
	}
	
	public function test()
	{
		dump($_POST);
		echo time();
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