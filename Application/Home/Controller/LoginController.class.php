<?php 
	
	namespace Home\Controller;

	use Think\Controller;

	include_once('class.phpmailer.php');

	include_once('class.smtp.php');

	class LoginController extends Controller
	{

		public function LoginExtends()
		{
			if(IS_POST){

				$checked = I('post.checked');	

				$data = D('Login')->LoginExtends();
				// dump($data);
				$id = $data['id'];

				
				if($data['bool']){

					//已判断帐号密码正确后，再进行判断邮箱是否激活
					$uses = M('user_s');
					
					$userInfo = $uses->where("zid ='$id' ")->field('status')->select();

					$status = $userInfo[0]['status'];

					// dump($status);

					// var_dump($data);
					// dump($checked);
					if($data['statu'] ==2 )
					{
						$this->ajaxReturn(4);

					}else{

						if($status ==1 )
						{

							//验证成功	
							if($checked ==true){

								$data['expire'] = 10000;
								session(array('expire'=>10));
								// dump($_SESSION['expire']);

								$_SESSION['userinfo'] = $data;
								// echo 1;

							}else{

								$_SESSION['userinfo'] = $data;

								// dump($_SESSION);exit;

							}
							

							$this->ajaxReturn(1);
							
						}else{

							//帐号密码正确，但是未激活	

							$this->ajaxReturn(0);

						}
					}
				}else{

					//验证帐号密码错误
					$this->ajaxReturn(2);
				}
			
			}else{

				$this->display();
				
			}

		}

		//生成验证码
		public function makeCode()
		{

			$Verify =new \Think\Verify();
			
			$Verify->fontSize = 30;

			$Verify->length   = 3;

			$Verify->useNoise = false;

			$Verify->entry();
		}
		//验证 验证码 是否正确

		public function checkCode($code)
		{

			$verify = new \Think\Verify();

			return $verify->check($code);
		}

		public function Code()
		{

			// dump(I('get.pass'));

			$id = I('get.id');

			$name = I('get.name');

			$pass =I('get.pass');

			$statu = I('get.statu');
			
			$m = M('user');

			$data = $m->where("name ='$name' ")->field('id,pass,status')->find();

			$bool = password_verify($pass, $data['pass']);

			$res = $this->checkCode($id);

			if(!$res) {

				$this->success('验证码错误');

				exit;
			}
			

			if($bool){

				// dump($bool);
				if($data['status'] !=2 ){

					$this->success('<a href="'.U('Login/status?name='.$name).'">此用户未激活，点击可进行激活</a>', U('Login/LoginExtends'),60);
						
					exit;
				}else{

					$this->error('此用户已被禁用');
					exit;
				}
			}else{

				$this->error('帐号密码有误');

				exit;
			}

			
		
		}

		public function status()
		{	

			$name = I('get.name');

			$m = M('user');

			$dat = $m->where("name ='$name' ")->find();

			// dump($dat['email']);

			$id = $dat['id'];

			$data['token_exptime'] = time();	

			$user = M('user_s')->where("zid='$id' ")->save($data);

			// dump($user);
			$exptime = $data['token_exptime'];

			$res = D('Register')->sendMail($dat['email'],"亲爱的".$name.":<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/><a href='http://192.168.42.112/test1111/first/index.php/Home/Register/Status?uid=".$id."&time=".$exptime." '>点击激活</a><br/>如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。<br/>如果此次激活请求非你本人所发，请忽略本邮件。<br/><p style='text-align:right'>-------- 美旅外卖 敬上</p>");

			// dump($res);

			if($res ==2 ){

				$this->success('恭喜您,已经重新发送验证码!请登录到您的邮箱及时激活您的帐号！',U('Login/LoginExtends'),30);
				
			}else{

				$this->error('失败',U('Login/LoginExtends'),60);
				
			}

		}

		//验证帐号密码是否正确
		public function verify()
		{	

			$name = I('post.name');

			$pass = I('post.pass');

			$id = I('post.sid');

			$m = M('user');

			$map['name']= $name;

			$data = $m->where($map)->find();

			$bool = password_verify($pass, $data['pass']);

			if($bool){

				$_SESSION['userinfo'] = $data;

				$this->success('登录成功',U('shopCar/orderList',array('id'=>$id)));

			}else{

				$this->error('登录失败',U('shopCar/orderList',array('id'=>$id)));
			}
		}

		//密码找回
		
		public function seekPass()
		{

			if(IS_POST){

				// dump(I('post.'));
				$name = I('post.name');

				$code = I('post.code');

				$m = M('user');

				$seekname = $m->where("name ='$name' ")->find();

				// $seekemail =$m->where("email = '$name' ")->find();

				//判断验证码是否正确
				$res = $this->checkCode($code);

				if(!$res) {

					$this->success('验证码错误');

					exit;
				}

				//判断用户名是否存在
				if($seekname){

					$this->success('成功',U('Login/yzPass?name='.$name).'');

				}else{
					
					$this->error(' 账号不存在，请重新输入');
				}
				
			}else{

				$this->display();
			}
		
		}	


		//验证密码
		public function yzPass()
		{
			if(IS_POST){

				$name = I('post.name');

				// dump($name);
				$rand = rand('100000','999999');

				// dump($rand);

				$m = M('user');

				$data =$m->where("name = '$name' ")->field('email')->find();

				$email = $data['email'];

				// dump($email);
				
				$res = D('Register')->sendMail($email,"亲爱的".$name.":<br/>这是你找回密码的验证码".$rand."<br/>如果此次找回密码非你本人所发，请忽略本邮件。<br/><p style='text-align:right'>-------- 美旅外卖 敬上</p>");

				if($res ==2){

					//下发短信成功
					$this->success("已经下发到".$email."邮箱上了,稍后需要填入找回密码的验证码就可以完成",U('Login/findPass?rand='.$rand.'&name='.$name.'&email='.$email).'',60);
					

				}else{

					$this->error('找回失败');

				}

			}else{

				$name = I('get.name');
				$this->assign('list', $name);
				$this->display();
			}
		}

		//找回密码时候邮箱验证
		public function findPass()
		{

			$rand = I('get.rand');

			$name = I('get.name');

			$email = I('get.email');

			// dump(I('get.'));

			$this->assign('list',$rand);

			$this->assign('email',$email);

			$this->assign('name',$name);

			$this->display();
			
		}

		//判断输入的邮箱验证码是否一致
		public function emailPass()
		{

			if(IS_POST){

				$code1 = I('post.code1') ;


				$code = I('post.code');

				$name = I('post.name');

				// dump($code1);

				// dump($code);

				// dump($name);

				if($code1 ==$code){

					$this->success('成功',U('Login/settingPassword?name='.$name).'');

					exit;
				}else{

					$this->error('请输入正确的邮箱验证码');
					exit;
				}
			
			}

		}

		//重置密码
		
		public function settingPassword()
		{

			if(IS_POST){

				$data = D('Login')->settingPassword();

				if($data ==1){

					$this->success('修改成功',U('Login/LoginExtends'),0);
					exit;
				
				}else{

					$this->error('修改失败');
					exit;
				}
				
			}else{

				// dump(I('get.name'));

				$name = I('get.name');

				$this->assign('list',$name);

				$this->display();
			}

		}


	}