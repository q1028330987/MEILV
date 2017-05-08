<?php
	namespace Home\Controller;
	use Think\Controller;
	class OutController extends Controller
	{
		
		public function outLogin()
		{

			// dump($_SESSION);
			unset($_SESSION['userinfo']);

			redirect(U('Index/index'), 1, '页面跳转中...');
			
		}

		//处理修改密码
		
		public function userPass()
		{

			if(IS_POST){

				$data = D('Out')->userPass();

				if($data ==1 ){

					//修改密码成功
					unset($_SESSION['userinfo']);
					
					echo 1;
				}else{

					//密码修改失败
					echo 2;
				}

			}else{

				$this->display();

			}

			

		}

	} 

 ?>