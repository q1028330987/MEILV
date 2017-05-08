<?php

	namespace MeilvAdmin\Controller;

	use Think\Controller;

	class CommonController extends Controller
	{

		public function __construct()
		{

			parent::__construct();

			//判断是否登录
			

			if( !$_SESSION['admin'] ){

				$this->error('请先登录', U('Login/login'));
			}

			// 登陆成功后还需要判断对某个方法是否有权限
			
			//实例化auth类
			$auth = new \Think\Auth;


			// $uid = 2;
			$uid = $_SESSION['admin']['id'];
			// dump($uid);

			// echo CONTROLLER_NAME;

			$name = MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME; 
			// echo $name;
			//调用check方法进行权限验证
			$bool = $auth->check($name ,$uid);

			// var_dump($_SESSION);


			if ( !$bool ) {

				//没有权限
				$this->error('你对此操作没有权限', U('Index/welcome') );
				exit;

			}

			
		}


	}




?>