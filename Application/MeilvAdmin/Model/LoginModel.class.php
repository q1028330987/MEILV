<?php
	namespace MeilvAdmin\Model;

	use Think\Model;

	class LoginModel extends Model
	{	

		protected $tableName = 'user';

		public function login()
		{
			$m = M('manager');

			$data  = I('post.');

			// var_dump($data);exit;

			$name = $data['name'];
			$map['pass'] = $data['pass'];


			$userInfo = $m->where("mname='$name'")->find();
			// echo $m->getLastSQL();

			// dump($userInfo);

			// dump( $userInfo['status'] ); exit;

			//验证密码
			
			$bool = password_verify($data['pass'], $userInfo['pass']);

			if($bool){

				//判断权限是否被禁用

				if($userInfo['status'] != 1){

					redirect(U('Login/login'), 3, '此帐号已被禁用,请联系管理员,3秒后调回登录页');	

				}

				//登录成功
				
				$_SESSION['admin'] = $userInfo;

				return true;
			}else{

				//登录失败
				return false;

			}

		}


	}