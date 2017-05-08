<?php
	namespace MeilvAdmin\Model;

	use Think\Model;
	
	class OrdersModel extends  Model
	{
		/**
		 * [getAllOrders 此方法用来获取所有订单]
		 * @return [type] [处理过的所有订单信息]
		 */
		public function getAllOrders()
		{


			//dump(I('get.'));
			$storename = I('get.storename');
			//店铺名搜索
			if (!empty($storename)) {
				# code...
				$map['name'] = ['LIKE', "%$storename%"];
				$list = M('store')->field('id')->where($map)->select();
				//dump($list);
				foreach ($list as $key => $value) {
					# code...
					$sid[] = $value['id'];
				}
				//$sid = join($sid, ',');
				//dump($sid);
				$search['sid'] = ['IN', $sid];
			}

			$oid = I('get.oid');
			//订单号搜索
			if (!empty($oid)) {
				# code...
				$search['id'] = $oid;
			}
			$order = M('orders');
			$count = $order->where($search)->count();
			$Page = new \Think\Page($count,5);

			$show = $Page->show();
			//dump($show);
			$orderList = $order->where($search)->limit($Page->firstRow.','.$Page->listRows)->select();
			//echo $order->getLastSql();
			//处理数据，把id变成对应的名字
			$sex = [1=>'先生','女士'];
			foreach ($orderList as $key => $value) {
				# code...
				$where = ['id'=>$value['uid']];
				//dump($where);
				$username = M('user')->field('name')->where($where)->find();
				//dump($name);
				$where1 = ['id'=>$value['sid']];
				$storename = M('store')->field('name')->where($where1)->find();

				$orderList[$key]['uid'] = $username['name'];

				$orderList[$key]['sid'] = $storename['name'];

				//把地址变成详细的地址信息数组
				$awhere = ['id'=>$value['aid']];
				$address = M('address')->where($awhere)->find();
				$orderList[$key]['aid'] = $address;
				$orderList[$key]['aid']['sex'] = $sex[$address['sex']];
			}
			$orderList['show'] = $show;
			// dump($orderList);

			return $orderList;
		}

		/**
		 * [getOrderDetail 此方法获取订单的详情]
		 * @param  [type] $id [订单表的id]
		 * @return [type]     [包含商品详情的的数组]
		 */
		public function getOrderDetail($id)
		{
			$where = ['oid'=>$id];
			$list = M('order_detail')->field('gid,num')->where($where)->select();
			foreach ($list as $key => $value) {
				# code...
				$gwhere = ['id'=>$value['gid']];
				$good = M('goods')->where($gwhere)->find();
				$list[$key]['gid'] = $good;
			}
			return $list;
			//dump($list);

		}


	}