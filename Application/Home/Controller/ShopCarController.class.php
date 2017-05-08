<?php
	namespace Home\Controller;
	use Think\Controller;
	class ShopCarController extends Controller
	{
		public function ajaxAddNum() 
		{
			if (IS_AJAX) {
				$id = I('post.id');
				$sid = I('post.sid');
				$shopcar = $sid.'shopCar';
				$where = ['id'=>$id];
				$goodList = M('goods')->where($where)->find();
				foreach ($_SESSION[$shopcar] as $key => $value) {
					if($goodList['id'] == $value['id']) {
						$_SESSION[$shopcar][$key]['num'] += 1;
						$goodList['exists'] = 1;
						$goodList['num'] = $_SESSION[$shopcar][$key]['num'];
						$this->ajaxReturn($goodList);
					}
					
				}
			}
		}
		
		public function ajaxAdd()
		{
			if (IS_AJAX) {
				$id = I('post.id');
				$sid = I('post.sid');
				$shopcar = $sid.'shopCar';
				$where = ['id'=>$id];
				$goodList = M('goods')->where($where)->find();
				if (empty($_SESSION[$shopcar])) {
					$goodList['exists'] = 0;
					$goodList['num'] = 1;
					$_SESSION[$shopcar][] = $goodList;

					// dump($_SESSION);
					$this->ajaxReturn($goodList);

				} else {

					foreach ($_SESSION[$shopcar] as $key => $value) {
						if($goodList['id'] == $value['id']) {
							$_SESSION[$shopcar][$key]['num'] += 1;
							$goodList['exists'] = 1;
							$goodList['num'] = $_SESSION[$shopcar][$key]['num'];
							$this->ajaxReturn($goodList);
						}
						
					}
					$goodList['exists'] = 0;
					$goodList['num'] = 1;
					$_SESSION[$shopcar][] = $goodList;
					$this->ajaxReturn($goodList);
				}


				 
				// $this->ajaxReturn($_SESSION['goods']);
			}
		}
		/**
		 * [ajaxDeleteCart 该方法用ajax清空购物车]
		 * @return [type] [description]
		 */
		public function ajaxDeleteCart() 
		{
			if (IS_AJAX) {
					$sid = I('post.sid');
					$shopcar = $sid.'shopCar';
					unset($_SESSION[$shopcar]);
					// DUMP($_SESSION);die;
					if (empty($_SESSION[$shopcar])) {
						$this->ajaxReturn('1');
					} else {
						$this->ajaxReturn('0');
					}
				}	
		}

		/**
		 * [ajaxReduce 此方法用ajax减少商品数量]
		 * @return [type] [description]
		 */
		public function ajaxReduce()
		{

			if (IS_AJAX) {
				// dump(I('post.'));
				$gid = I('post.id');
				$shopcar = I('post.sid').'shopCar';
				
				foreach($_SESSION[$shopcar] as $k=>$v) {
					if ($v['id'] == $gid) {
						if ($v['num'] > 1) {
							$_SESSION[$shopcar][$k]['num'] -= 1;
							$this->ajaxReturn('1');
						} else if($v['num'] <=1) {
							unset($_SESSION[$shopcar][$k]);
							if (empty($_SESSION[$shopcar])) {
							$this->ajaxReturn('2');
							}
							$this->ajaxReturn('0');
						}
					}
				}
			}
		}
		/**
		 * [orderList 此方法为订单提交页面]
		 * @return [type] [description]
		 */
		public function orderList()
		{
			if (empty($_SESSION['userinfo'])) {
				$login = '0';
			} else {
				$sex = [1=>'先生','女士'];
				$login = '1';
				$where = ['uid'=>$_SESSION['userinfo']['id']];
				$where['status'] = 1;
				$addressList = M('address')->where($where)->select();
				foreach ($addressList as $key => $value) {
					$addressList[$key]['sex'] = $sex[$value['sex']];
				}
			}
			$shopcar = I("get.id").'shopCar';
			// dump($addressList);
			$num = 0;
			$totalPrice = 0;
			foreach ($_SESSION[$shopcar]as $key => $value) {
				$num += $value['num'];
				$totalPrice += $value['price']*$value['num'];
			}
			$totalPrice += $num;
			$where = ["id"=>I('get.id')];
			$store = M('store')->field('name,peisend')->where($where)->find();
			$storeName = $store['name'];
			$totalPrice += $store['peisend'];
			$this->assign('storeName', $storeName);
			$this->assign('addressList', $addressList);
			$this->assign('login', $login);
			$this->assign('num', $num);
			$this->assign('sid', I('get.id'));
			$this->assign('totalPrice', $totalPrice);
			$this->assign('orderList', $_SESSION[$shopcar]);
			$this->display('Orders/orderList');
		}

		/**
		 * [newOrder 此方法为付款后生成订单]
		 * @return [type] [description]
		 */
		public function newOrder()
		{
			// dump(I('post.'));
			// dump($_SESSION);die;
			$shopcar = I('post.sid').'shopCar';
			
			if (empty($_SESSION[$shopcar])) {
					$this->error('您还没有选择商品');

					die;
				}
			//开启事物
			M()->startTrans();
			$status = true;
			// $data['uid'] = $_SESSION['userinfo']['id'];
			$data['uid'] = I('post.uid');
			$data['aid'] = I('post.aid');
			$data['price'] = I('post.totalPrice');
			$data['sid'] = I('post.sid');
			// dump($data);die;
			$res = M('orders')->add($data);
			// echo M('orders')->getLastSql();die;
			if ($res > 0) {
				
				foreach ($_SESSION[$shopcar] as $key => $value) {
					$map['oid'] = $res;
					$map['gid'] = $value['id'];
					$map['num'] = $value['num'];
					$bool = M('order_detail')->add($map);
					if (!($bool >0) ) {
						$status = false;
					}
				}

			} else {
				$status = false;
			}
			if ($status) {
				M()->commit();
				unset($_SESSION[$shopcar]);
				$this->success('下单成功', U("Index/index"));
			} else {
				M()->rollback();
				$this->error('订单生成失败');
			}
		}

	} 

