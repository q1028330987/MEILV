<?php
	namespace Home\Controller;
	use Think\Controller;
	class UserController extends CommonController
	{
		/**
		 * [userInfo 显示账户信息]
		 * @return [type] [description]
		 */
		public function userInfo()
		{


			$list = M('user')->where('id='.$_SESSION['userinfo']['id'])->find();
			$list['phone'] = substr_replace($list['phone'],'****',3,4);
			$this->assign('list',$list);
			$this->display('User/index');

		}
		/**
		 * [saveUserName 修改账户名]
		 * @return [type] [description]
		 */
		public function saveUserName()
		{

			if (IS_POST) {
				
				$bool = D('user')->saveUsername();
				if ($bool) {
					echo 1;
		    		 // $this->success("修改成功",U("User/userInfo"),3); 
		    	} else {
		    		// $this->error('修改失败',U('User/userInfo'),3);
		    		echo 0;
		    	}
				exit;
			}else{
				$id = I('get.id');
				// dump($list);
				$list = M('user')->find($id);
				$this->assign('list',$list);
				$this->display('User/saveUserName');
			}

		}

		/**
		 * [collect 显示我的收藏]
		 * @return [type] [description]
		 */
		public function collect()
		{

			if (IS_POST) {
				// dump(I('post.'));
				$sid=I('post.sid');
				$uid=I('post.uid');
				$res = M('collect')->where("sid=$sid and uid=$uid")->delete();
				echo M('collect')->getLastSQL();
				if ($res) {
					echo 1;
				}else{
					echo 0;
				}
			}else{

				// $_SESSION['userinfo']['id'] = 3;
				$list = D('User')->selectCollect($_SESSION['userinfo']['id']);
				$this->assign('list',$list);
				$this->display();

			}

		}

		/**
		 * [userStore 显示用户商铺]
		 * @return [type] [description]
		 */
		public function userStore()
		{

			if (IS_POST) {
				# code...
			}else{
				$userinfo = M('user')->where('id='.$_SESSION['userinfo']['id'])->find();
				if($userinfo['businessman'] == 1) {

		    		$info = D('goods')->getUserStore($_SESSION['userinfo']['id']);
		    		$info['id'] = I('get.id');

		    	}else{

		    		$info = false;

		    	}
		    	// dump($info);
		    	$this->assign('id',$info['id']);
		    	$this->assign('goodsData',$info['goodsData']);
		    	$this->assign('goodsType', $info['goodsType']);
		    	$this->assign('info', $info['store']);
		        $this->display();

			}

		}

		public function savePhone()
		{

			if (IS_POST) {
				// dump(I('post.phone'));
				// dump($_SESSION['userinfo']);
				$data['phone'] = I('post.phone');
				$data['id'] = $_SESSION['userinfo']['id'];
				$res = M('user')->save($data);
				if ($res) {
					echo 1;
				}else{
					echo 0;
				}
			} else {
				
				$list = M('user')->where('id='.$_SESSION['userinfo']['id'])->find();
				// dump($list);
				$this->assign('list',$list);
				$this->display();

			}

		}

	} 

 ?>