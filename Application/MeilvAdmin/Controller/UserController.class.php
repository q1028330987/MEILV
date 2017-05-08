<?php
	namespace MeilvAdmin\Controller;

	use Think\Controller;
	
	class UserController extends  CommonController{

		/**
		 * [index 显示会员管理中的会员列表]
		 * @return [type] [data]
		 */
		public function index()
		{

			$data = D('User')->index();

			$this->assign('list', $data);

			$this->display('member-list');

		}

		/**
		 * [editor 添加用户]
		 * @return [type] [对象]
		 */
		public  function editor()
		{
			if(IS_POST){

			// dump(I('post.'));

       		$stuModel = D('User');

       		//使用create()方法来创建数据对象
       		$res = $stuModel->create();//这个方法可以触发自动验证、自动完成

       		if (!$res) {
       			$this->error( $stuModel->getError() );
       			exit;
       		}

       		$stuModel->add();

       		$this->success('添加成功');

 
			}else{

				$this->display('member-add');
			}
			

		}

		/**
		 * [del 删除会员]
		 * @return [type] [ajax]
		 */
		public function del()
		{
			
			$res = D('User')->del();

			$this->ajaxReturn($res);

		}
		/**
		 * [change_password 显示用户名]
		 * @return [type] [description]
		 */
		public function userPassword()
		{

			if(IS_POST){

				

			}else{
				
			$id = I('get.id');

			// var_dump($id);

			$User = M('user');

			$data = $User->where("id=$id")->find();

			// var_dump($data);

			$this->assign('list', $data);

			$this->display('change-password');

			}
		}

		/**
		 * [change_password 修改密码]
		 * @return [type] [description]
		 */
		public function change_password()
		{

			if(IS_POST){

			$res = D('User')->change_password();

			// var_dump($res);

			if($res == 1){

				$this->success('修改成功');

			}else{

				$this->error('修改失败');
			}
			
			}

		}

		/**
		 * [start 处理禁用]
		 * @return [type] [$res]
		 */
		public function start()
		{

			$res = D('User')->start();

			// echo I('post.id');

			// var_dump($res);

			$this->ajaxReturn($res);

		}

	}


