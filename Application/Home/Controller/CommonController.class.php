<?php

	namespace Home\Controller;

	use Think\Controller;

	class CommonController extends Controller
	{

		public function __construct()
		{

			parent::__construct();

			//判断是否登录
			
			if( !$_SESSION['userinfo'] ){

				$this->error('请先登录', U('Login/LoginExtends'));
			}
			
		}

	}

?>