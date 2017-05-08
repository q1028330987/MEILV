<?php
	namespace MeilvAdmin\Controller;

	use Think\Controller;

	class LoginController extends Controller
	{

		public function login()

		{
			if (IS_POST) {

				//验证验证码是否正确
				
				$res = $this->checkCode(I('post.code') );

				if(!$res) {

					$this->error('验证错误');

					exit;
				}

				$userModel = D('Login');

				$bool = $userModel->login();
				if( $bool ) {

					$this->success('登录成功',U('Index/index'));
					exit;
				}

			$this->error('登录失败');

			exit;	

			}else{

				$this->display();
			}
		}

		//生成验证码
		public function makeCode()
		{

			$Verify =     new \Think\Verify();

			$Verify->useImgBg = true; 
			
			$Verify->entry();
		}
		//验证 验证码 是否正确

		public function checkCode($code)
		{

			$verify = new \Think\Verify();

			return $verify->check($code);
		}

	}