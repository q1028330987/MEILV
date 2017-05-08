<?php
	namespace Home\Controller;
	use Think\Controller;
	class GoodsTypeController extends Controller
	{

		public function del()
		{

			$id = I('post.id');
			// dump($id);
			$res = M('goods')->where('tid='.$id)->select();
			// dump($res);
			if(empty($res)){

				$res = M('goods_type')->delete($id);
				if ($res) {

					echo 1;
					
				}else{

					echo 0;
				}

			}else{

				echo 2;

			}

		}


		public function saveType()
		{

			// dump(I('post.'));
			$data = I('post.');
			$goodsData = M('goods_type')->where('id='.I('post.id'))->find();
			// dump($goodsData);

			if ($goodsData['name'] == $data['name']) {
				echo 3;
			}else{

				$res = M('goods_type')->save($data);
				if ($res) {
					echo 1;
				}else{
					echo 0;
				}

			}

		}

		public function addType()
		{

			$data = I('post.');
			if (empty($data)) {
				
				$this->error('你不能啥都不传吧！');

			}

			$res = M('goods_type')->data($data)->add();
			// dump(I('post.'));
			if ($res) {
				
				$data['true'] = 1;
				$data['id'] = $res;
				$this->ajaxreturn($data);

			}else{
				
				$data['true'] = false;

			}

		}

	} 

 ?>