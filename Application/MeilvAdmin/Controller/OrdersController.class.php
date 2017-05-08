<?php
	namespace MeilvAdmin\Controller;

	use Think\Controller;

	class OrdersController extends  Controller
	{

		/**
		 * [ordersList 订单列表页面]
		 * @return [type] [description]
		 */
		public function ordersList()
		{

			
			// dump(I('get.'));
			$orderList = D('Orders')->getAllOrders();
			//dump($orderList['show']);
			$show = $orderList['show'];
			unset($orderList['show']);
			$this->assign('list', $orderList);
			$this->assign('show', $show);
			$this->display('list');

		}

		/**
		 * [ordersDetail 订单详情页面]
		 * @return [type] [description]
		 */
		public function ordersDetail()
		{
			$id = I('get.id');
			$totalprice = I('get.totalprice');

			$list = D('Orders')->getOrderDetail($id);

			$this->assign('list', $list);
			$this->assign('totalprice', $totalprice);
			$this->display('detail');
		}


	}


