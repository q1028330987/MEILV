<?php 
	
	namespace MeilvAdmin\Controller;

	use Think\Controller;

	class OutController extends Controller
	{

		//处理退出登录
		public function outLogin()
		{

			// dump($_SESSION);
			unset($_SESSION['admin']);

			redirect(U('Login/login'), 1, '页面跳转中...');

		}


	}



?>