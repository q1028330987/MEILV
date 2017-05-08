<?php
	namespace Home\Controller;
	use Think\Controller;
	include_once('class.phpmailer.php');

	include_once('class.smtp.php');
	class RegisterController extends Controller
	{

		/**
		 * [register 认证用户名是否被注册]
		 * @return [type] [description]
		 */
		public function userRegister()
		{

			if(IS_AJAX){
			
			$data = D('Register')->userRegister();

				$this->ajaxReturn($data);

			}else{

				$this->display();

			}

		}

		/**
		 * [userRegisterTwo 接收邮箱验证码]
		 * @return [type] [post]
		 */
		public function userRegisterTwo()
		{

			if(IS_POST){

				$data = D('Register')->userRegisterTwo();

				$email = $data['email'];

				$name = $data['name'];

				$id = $data['id'];

				$exptime = $data['exptime'];

				// dump($exptime);

				if($data['res'] == null){

					$this->error('此帐号已被注册');
				}
				
				$res = D('Register')->sendMail($email,"亲爱的".$name.":<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/><a href='http://192.168.42.123/first/index.php/Home/Register/Status?uid=".$id."&time=".$exptime." '>点击激活</a><br/>如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。<br/>如果此次激活请求非你本人所发，请忽略本邮件。<br/><p style='text-align:right'>-------- 美旅外卖 敬上</p>");
				
				if($res ==2){

					$this->success('恭喜您，注册成功!请登录到您的邮箱及时激活您的帐号！',U('Login/LoginExtends'),60);
					

				}else{

					$this->error('注册失败',U('Register/userRegister'),60);

				}
				
			}

		}

		/**
		 * [Status 判断激活码是否超时]
		 */
		public function Status(){

			$id = I('get.uid');

			$exptime = intval( I('get.time') );

			$now = time();

			if($now > $exptime +100000){

				// dump($now);
				// dump($exptime);
				//超过激活时间，不能激活
				$this->error('亲,已经超过激活时间,请获取激活','http://192.168.42.123/first/index.php/Home/Login/LoginExtends',300);

			}else{

				//可以激活，还没超过激活时间

				$User = M('user_s');

				$data['status'] = 1;

				$res = $User->where("zid='$id' ")->save($data);

				// dump($res);

				if($res){

					$this->success('亲,激活成功','http://192.168.42.123/first/index.php/Home/Login/LoginExtends');
				}else{

					$this->error('亲,已激活过了','http://192.168.42.123/first/index.php/Home/Login/LoginExtends');

				}

			}	

		

		}


	} 

 