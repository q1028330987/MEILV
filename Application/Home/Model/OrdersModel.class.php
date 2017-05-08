<?php 

	namespace Home\Model;
	use Think\Model;
	class OrdersModel extends Model
	{
		/**
		 * [getOrders 获取商户的所有订单信息]
		 * @param  [type] $uid [商家的id]
		 * @return [type]      [遍历好的订单信息表格]
		 */
		public function getOrders($uid)
		{
			// return $uid;
			$where = ['uid'=>$uid];
			$list = M('store')->where($where)->find();
			$where1 = ['sid'=>$list['id']];
			//分页
			$count = M('orders')->where($where1)->count();
			$Page = new \Think\Page($count,2);
			$show = $Page->show(); 

			$orders = M('orders')->where($where1)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			

			if (empty($orders)) {
				$table = '暂无订单';
				return $table;
			}
			$table = '<table class="table table-hover">';

				$table .= '<tr>
							<th>订单号</th>
							<th>下单用户</th>
							<th>订单总价</th>
							<th>操作</th>
							</tr>';

				$arr = ['发货','等待确认收货','已收货待评论','已评论'];
				$sex = [1=>'先生','女士'];

				foreach ($orders as $key => $value) {

					# 把uid变成具体用户的名字
					$uwhere = ['id'=>$value['uid']];
					$name = M('user')->where($uwhere)->find();
					// dump($name);
					$orders[$key]['uid'] = $name['name'];
					 // dump($value);
				 	//查出订单具体地址，写入数组中
				 	$awhere = ['id'=>$value['aid']];
				 	$address = M('address')->where($awhere)->find();
					$orders[$key]['aid'] = $address;
					$orders[$key]['aid']['sex'] = $sex[$address['sex']];

					$table .= "<tr>
								<td class='orderid'>{$value['id']}</td>
								<td>{$orders[$key]['uid']}</td>
								<td>{$value['price']}</td>";
						//根据订单状态给出对应的样式
						if ($value['status'] == 0) {
							# code...
							$table .= "<td style='cursor:pointer' class='btn btn-warning'>{$arr[$value['status']]}</td>";
								
						} else {
							$table .= "<td>{$arr[$value['status']]}</td>";
						}
					$table .=	"</tr>";
					$dwhere = ['oid'=>$value['id']];
					$orderDetail = M('order_detail o')->where($dwhere)->join('__GOODS__ g ON o.gid=g.id')->select();
					// dump($orderDetail);
					foreach ($orderDetail as $k => $v) {
						# code...
						$table .= "<tr>
									<td>{$v['name']}</td>
									<td>单价:￥{$v['price']}</td>
									<td><img height='50' src='".__ROOT__."/Public/{$v['pic']}'></td>
									<td>{$v['num']}份</td>
									</tr>";
					}
					// dump($)
					//加上收货地址
					$table .= "<tr>
								<td>收件人：{$orders[$key]['aid']['name']}{$orders[$key]['aid']['sex']}</td>
								<td>联系电话：{$orders[$key]['aid']['phone']}</td>
								<td>收货地址：{$orders[$key]['aid']['address']}</td>
								</tr>";
				}
				   // dump(__ROOT__);
				 

			$table .= '</table>';
			$table .= '<div class="page1">'.$show.'</div>';
			return $table;
		}

		/**
		 * [getBuyOrders 获取一般用户所下的订单]
		 * @param  [type] $uid [用户的id]
		 * @return [type]      [array]
		 */
		public function getBuyOrders($uid)
		{
			$where = ['uid'=>$uid];
			//分页
			$count = M('orders o')->where($where)->count();
			$Page = new \Think\Page($count,2);
			$show = $Page->show();
			$list = M('orders o')->where($where)->order('o.time desc')->limit($Page->firstRow.','.$Page->listRows)->select();

			foreach ($list as $key => $value) {
				//把sid换成对应的店铺名字
				$where1 = ['id'=>$value['sid']];
				$storeName = M('store')->field('name')->where($where1)->find();
				// dump($orderDetail);
				$list[$key]['sid'] = $storeName['name'];

				//把aid换成对应的详细地址数组
				$where4 = ['id'=>$value['aid']];
				$aid = M('address')->where($where4)->find();
				$sex = [1=>'先生','女士'];
				$aid['sex'] = $sex[$aid['sex']];
				$list[$key]['aid'] = $aid;
				//把订单表的ID换成对应订单详情的数组
				$where2 = ['oid'=>$value['id']];
				$orderDetail = M('order_detail')->where($where2)->select();
				$list[$key]['id'] = $orderDetail;

				foreach ($list[$key]['id'] as $k => $v) {
					//把订单详情里面的gid换成对应的商品详情
					$where3 = ['id'=>$v['gid']];
					$goodsDetail = M('goods')->where($where3)->find();
					$list[$key]['id'][$k]['gid'] = $goodsDetail;
					// dump($v);
				}
				
			}
			//dump($list);
			$list['show'] = $show;
			return $list;
		}

		/**
		 * [ordersRate 执行评论，包含事物处理]
		 * @return [type] [bool值]
		 */
		public function ordersRate()
		{
			// dump(I('post.'));
			$map['level'] = I('post.rate');
			$map['content'] = I('post.message');
			$map['oid'] = I('post.oid');
			if (empty($map['level'])) {
				$map['level'] = 5;
			}
			if (empty($map['content'])) {
				unset($map['content']);
			}
			M()->startTrans();
			$status = true;
			$bool = M('comment')->add($map);
			if (!$bool) {
				$status = false;
			}
			$data['status'] = 3;
			$data['id'] = $map['oid'];
			$bool1 = M('orders')->save($data);
			if (!$bool1) {
				$status = false;
			}
			// dump($status);
			if ($status) {
				M()->commit();
			} else {
				M()->rollback();
			}
			return $status;
		}

		/**
		 * [getMyRate 获取用户的所有评论]
		 * @return [type] [返回处理好的数组]
		 */
		public function getMyRate()
		{
			// dump($_SESSION);
			$where = ['uid'=>$_SESSION['userinfo']['id']];

			//分页
			$count = M('orders o')->where($where)->join('__COMMENT__ c ON o.id=c.oid')->count();
			// echo $count;
			$Page = new \Think\Page($count,6);
			$show = $Page->show();

			$list = M('orders o')->where($where)->join('__COMMENT__ c ON o.id=c.oid')->order('c.time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			// dump($list);
			foreach ($list as $key => $value) {
				//为星星写一个宽度
				$list[$key]['star'] = $value['level'] * (72/5);
				//把店铺id变成对应的名字
				$where = ['id'=>$value['sid']];
				$storeName = M('store')->field('name')->where($where)->find();
				$list[$key]['sid'] = $storeName['name'];
			}
				// dump($list);
			$list['show'] = $show;
			return $list;
		}
	} 
