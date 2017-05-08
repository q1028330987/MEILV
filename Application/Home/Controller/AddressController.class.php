<?php
	namespace Home\Controller;
	use Think\Controller;
	class AddressController extends Controller
	{
		
		public function addAddress()
		{
			// dump(I('post.'));die;
			if (empty(I('post.phone')) || empty(I('post.address')) || empty(I('post.name')) || empty(I('post.address-sex'))) {
				$this->error('请输入完整的地址信息');
			}
			$sid = I('post.sid');
			$map['uid'] = $_SESSION['userinfo']['id'];
			$map['phone'] = I('post.phone');
			$map['address'] = I('post.address');
			$map['name'] = I('post.name');
			$map['sex'] = I('post.address-sex');
			M('address')->add($map);
			header( "location:".U('ShopCar/orderList',['id'=>$sid]) );

		}

		/**
		 * [delAddress 这个方法用来改变地址的状态，用以达到用户删除地址的目的]
		 * @return [type] [description]
		 */
		public function delAddress()
		{

			$id = I('post.aid');
			$where = ['id'=>$id];
			$data['status'] = 2;
			$bool = M('address')->where($where)->save($data);
			if ($bool > 0) {
				$this->ajaxReturn('1');
			} else {
				$this->ajaxReturn('0');
			}
		}
	} 

