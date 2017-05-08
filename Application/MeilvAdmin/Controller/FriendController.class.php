<?php
	namespace MeilvAdmin\Controller;

	use Think\Controller;
	
	class FriendController extends  CommonController{


		//友情链接显示
		public function listShow()
		{
			$data = D('Friend')->listShow();
			$this->assign('list', $data);
			$this->display();
		}

		//删除友情链接
		public function listLose()
		{

			$data = D('Friend')->listLose();

			if($data ==1){

				$this->success('删除成功');

			}else{

				$this->error('修改失败');

			}

		}

		//编辑友情链接
		public function listEdit()
		{

			if(IS_POST){

				$name = I('post.name');
			
				$address = I('post.address');

				$id = I('post.id');

				$List = M('link');

				$data['name']  = $name;

				$data['url'] = $address;

				$res = $List->where("id ='$id'")->save($data);

				if($res){

					$this->success('修改成功',U('Friend/listShow'));

					exit;

				}else{

					$this->error('修改失败');

					exit;
				}

			}else{

				$id = I('get.id');

				$link = M('link')->where("id='$id'")->find();

				// dump($link);

				$this->assign('list',$link);

				$this->display();
			}
		}

		//添加友情链接
		
		public function listAdd()
		{

			if(IS_POST){

				$data = D('Friend')->listAdd();

				if($data){

					$this->success('添加成功',U('Friend/listShow'));
					exit;
				}else{

					$this->error('添加失败');
					exit;
				}
			}

			$this->display();

		}


	}


