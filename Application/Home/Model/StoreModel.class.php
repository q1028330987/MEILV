<?php

	namespace Home\Model;

	use Think\Model;

	/**
	* 
	*/
	class StoreModel extends Model
	{



		//获得所有的商铺，按平均评分排咧
		public function getAllStore()
		{

			//判断是否是ajax的请求
			if ( !empty( I('post.limit') ) ) {

				$limit = I('post.limit');
				$num = 4;
			} else {
				$limit = 0;
				$num = 4;
			}

			//ajax传过来分类id
			if ( !empty( I('post.id')) ) {
				$map['tid'] = I('post.id');
			}

			//判断是否是点击分类
			if ( !empty( I('get.id') ) ) {
				$map['tid'] = I('get.id');
			}

			$map['status'] = 1;

			//得到餐厅列表
			$storeList = $this->where($map)->order('clickNum desc')->limit($limit, $num)->select();
	
			// echo $this->getLastSql();exit;
			// dump($storeList);exit;
			
			//循环遍历插入求出来的店铺平均分数
			foreach ($storeList as $k=>$v) {
				$level = [];
				$id = $v['id'];

				//是否收藏
				if ( !empty($_SESSION['userinfo']) ) {

					$uid = $_SESSION['userinfo']['id'];

					$res = M('collect')->where("uid=$uid AND sid=$id")->find();

					if ($res) {

						$storeList[$k]['collect'] = 1;

					} else {

						$storeList[$k]['collect'] = 0;

					}
				}

				$oids = M('orders')->where("sid=$id")->select();


				foreach ($oids as $o) {
					// echo 1;
					
					$map['oid'] = $o['id'];
					
					$comment = M('comment')->field('level')->where($map)->find();
					// dump($comment);

					if ( empty($comment) ){

						// $level[] = 5;

					} else {

						$level[] = $comment['level'];

					}
				// dump($level);
				}
				
				// dump($level);

				$aregLevel = array_sum($level)/count($level);
				// dump($aregLevel);

				$storeList[$k]['level'] = number_format($aregLevel,1);

				$storeList[$k]['levelper'] = ($aregLevel/5.0)*74;

			}
			// dump($storeList);exit;
			array_multisort(array_column($storeList,'level'),SORT_DESC,$storeList);

			return $storeList;

		}

		//获取某一餐厅的所有信息
		public function getStore () {

			$id = I('get.id');
			
			//添加点击量
			// setInc加点击量
			$this->where("id=$id")->setInc('clickNum');

			// $level = I('get.level');

			// $levelper = I('get.levelper');

			$storeInfoList = $this->where("id=$id")->find();

			if (I('get.a') == 'comment') {

				$storeInfoList['comment'] = 'comment';

			}


			//获取计算平均分
			$oids = M('orders')->where("sid=$id")->select();


			foreach ($oids as $o) {
				// echo 1;
				
				$map['oid'] = $o['id'];
				
				$comment = M('comment')->field('level')->where($map)->find();
				// dump($comment);

				if ( empty($comment) ){

					// $level[] = 5;

				} else {

					$level[] = $comment['level'];

				}
			// dump($level);
			}
			
			// dump($level);

			$aregLevel = array_sum($level)/count($level);
			// dump($aregLevel);

			// $storeList[$k]['level'] = number_format($aregLevel,1);

			//查出餐厅送货速度的排名
			if ($storeInfoList['atime'] != 0) {

				$sql = " SELECT count(*)  from (SELECT * FROM `mlv_store` ORDER BY atime) as a where atime >= (SELECT atime AND status=1 from `mlv_store` where id = '$id')";

				$num = M()->query($sql);


				$ranking = $num[0]['count(*)'];
				//查出总餐厅数
				$sql = "SELECT count(*) FROM mlv_store WHERE status=1 limit 1";

				$count = M()->query($sql)[0]['count(*)'];
				// dump($storeInfoList);

				//求出百分比
				$per = number_format($ranking/$count*100, 2);
				// dump($per);

				$speed = $ranking;

			} else {
				$per = 0;
				$speed = 0;
			}

			// dump($per);exit;
			$storeInfoList['per'] = $per;

			$storeInfoList['speed'] = $speed;

			$storeInfoList['level'] = number_format($aregLevel,1);

			$storeInfoList['levelper'] = $aregLevel/5*72;

			// dump($_GET);

			return $storeInfoList;
		}

		//获取某一餐厅的所有菜品
		public function getAllFood()
		{
			$id = I('get.id');
			// date_default_timezone_set('Asia/Shanghai');


			// $sql = "SELECT * FROM mlv_orders WHERE DATE_FORMAT( time, '%Y%m' ) = DATE_FORMAT( CURDATE( ) , '%Y%m' ) AND id in $ids";

			//通过店铺id查出数据店铺的所有分类的名字和id
			$storeTypes = M('goods_type')->field('id, name')->where("sid=$id")->select();

			//遍历所有分类，取出所有商品
			foreach ($storeTypes as $k=>$v) {

				//取出每个分类的id
				$id = $storeTypes[$k]['id'];

				//通过分类id查出当前分类里面的所有商品
				$storeTypes[$k]['goodsInfo'] = M('goods')->where("tid=$id")->select();

				//判断此分类里面是否有商品
				if ( !empty($storeTypes[$k]['goodsInfo']) ) {
					// echo 1;
					
					//遍历取出来的商品
					foreach ($storeTypes[$k]['goodsInfo'] as $i=>$g) {

						$gid = $g['id'];

						//通过商品的id查询订单详情表中关于这个商品的订单表，目的是为了统计月销量
						$oids = M('order_detail')->field('oid')->where("gid=$gid")->select();

						$oid = [];

						foreach ($oids as $o) {

							$oid[] = $o['oid'];

						}

						$oids = implode(',', $oid);
						// echo M()->getLastSql();echo '<br>';
						// dump($oids);exit;
						if (!empty($oids)) {
							// M('orders')->where("DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= date(time) and id in ($oids)")->field('count(*)')->select();
							
							//查出每个商品的月销量，统计的是订单详情页的num
							$sql = "SELECT sum(d.num) from mlv_order_detail d join mlv_orders o on  d.oid = o.id where DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= date(o.time) and d.gid = $gid ";

							// $sql = "SELECT count(mlv_orders.id) FROM mlv_orders where DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= date(time) and id in ($oids)";
							
							$count = M()->query($sql)[0]["sum(d.num)"];
							// echo M()->getLastSql();echo '<br>';
							// dump($count);

							$storeTypes[$k]['goodsInfo'][$i]['monthSale'] = $count;
							// dump($storeTypes);
						}

					}

					// $gid = $storeTypes[$k]['goodsInfo']['id'];

					// dump($oids);

					// echo M()->getLastSql();exit;
				}
			}
					// dump($storeTypes);
			// dump($storeTypes);
			return $storeTypes;
		}

		//获取分数
		public function getLevel()
		{
			$id = I('get.id');

			$levelper = I('get.level')/5*120;

			$count['levelper'] = $levelper;
			// dump($levelper);
			$oids = M('orders')-> field('id, uid')->where("sid=$id")->select();
			// dump($oids);
			
			//定义好评差评的总数
			$goodPing = 0;
			$midelPing = 0;
			$badPing = 0;

			$five = 0;
			$four = 0;
			$three = 0;
			$two = 0;
			$one = 0;

			foreach ($oids as $k=>$v) {

				$oid = $v['id'];

				$gids = M('order_detail')->field('gid')->where("oid=$oid")->select();

				foreach ($gids as $g) {

					$gnames[] = M('goods')->field('name')->where("id={$g['gid']}")->find();

				}
				
				// dump($gnames);
				$comment = M('comment')->field('level')->where("oid=$oid")->find();
				// echo M()->getLastSql();
				// dump($comment);
				//处理分数，好差评，星星的长度
				if ( !empty($comment) ) {

					if ($comment['level'] > 4) {
						// $comment['ping'] = '好评';
						$goodPing++;
						$five++;
					} elseif($comment['level'] > 3) {
						// $comment['ping'] = '中评';
						$midelPing++;
						$four++;
					} elseif($comment['level'] > 2) {
						// $comment['ping'] = '中评';
						$midelPing++;
						$three++;
					} elseif($comment['level'] > 1) {
						// $comment['ping'] = '差评';
						$badPing++;
						$two++;
						
					} else {
						// $comment['ping'] = '差评';
						$one++;
						$badPing++;
					}

					
					//求出评论的总条数
					$allcount = M('comment')->field('mlv_user.name,mlv_comment.*')->join('LEFT JOIN mlv_orders on mlv_comment.oid=mlv_orders.id')->join('left join  mlv_user on mlv_user.id=mlv_orders.uid')->where("mlv_orders.sid=$id")->count();

					$count['allcount'] = $allcount;

					// echo M()->getLastSql();
					// echo $allcount;
					// $username = M('user')->field('name')->where("id={$v['uid']}")->find()['name'];
					
					
					//处理用户名
					// $len = mb_strlen($username, 'utf-8');

					// $str1 = mb_substr($username,0,1,'utf-8');
	    //     				$str2 = mb_substr($username,$len-1,1,'utf-8');

					// $username = $str1.'***'.$str2;

					// $comment['username'] = $username;
					// $comments[] = $comment;

					//好评差评中评的数量
					$count['goodPing'] = $goodPing;
					$count['midelPing'] = $midelPing;
					$count['badPing'] = $badPing;
					$count['allPing'] = $five + $four + $three + $two + $one;

					//
					$count['five'] = number_format($five/$count['allPing']*100, 1);
					$count['fiveLen'] = $five/$count['allPing']*65;

					$count['four'] = number_format($four/$count['allPing']*100, 1);
					$count['fourLen'] = $four/$count['allPing']*65;

					$count['three'] = number_format($three/$count['allPing']*100, 1);
					$count['threeLen'] = $three/$count['allPing']*65;

					$count['two'] = number_format($two/$count['allPing']*100, 1);
					$count['twoLen'] = $two/$count['allPing']*65;

					$count['one'] = number_format($one/$count['allPing']*100, 1);
					$count['oneLen'] = $one/$count['allPing']*65;

				}
			}
			// dump( count($comments) );
			// $all[] = $comments;
			$count;
			// dump($count);

			// exit;
			return $count;
			
			
		}

		//获取评论
		public function getComments()
		{
			// dump($_GET);
			$limit = 2;

			$id = I('get.id');

			$p = I('get.p');
			// echo I('get.type');
			$type = I('get.type');

			$level = I('get.level');
			// $offset = 0;
			// $p = 1;
			if (!empty($p)) {
				
				$offset = $p*$limit;

			}

			
			$map["mlv_orders.sid"] = array('EQ', $id);
			$smp["mlv_orders.sid"] = array('EQ', $id);

			if (!empty($type)) {
				switch ($type) {

					case '1':

						$map["mlv_comment.level"] = array( 'BETWEEN', array(3.9, 5) );

						$smp["mlv_comment.level"] = array( 'BETWEEN', array(3.9, 5) );
						break;

					case '2':

						// echo 1;
						$map["mlv_comment.level"] = array( 'BETWEEN', array(2, 3.9) );

						$smp["mlv_comment.level"] = array( 'BETWEEN', array(2, 3.9) );
						break;

					case '3':

						$map["mlv_comment.level"] = array( 'BETWEEN', array(0, 1.9) );

						$smp["mlv_comment.level"] = array( 'BETWEEN', array(0, 1.9) );
						break;

					default:
						# code...
						break;
				}
			}

			//这是一个名字切割函数
			function substr_cut ($user_name) {

				$strlen     = mb_strlen($user_name, 'utf-8');

				$firstStr     = mb_substr($user_name, 0, 1, 'utf-8');

				$lastStr     = mb_substr($user_name, -1, 1, 'utf-8');

				return $strlen == 2 ? $firstStr . str_repeat('*', mb_strlen($user_name, 'utf-8') - 1) : $firstStr . str_repeat("*", $strlen - 2) . $lastStr;
			}
			
			//求出评论的总条数
			
			$count = M('comment')->field('mlv_user.name,mlv_comment.*')->join('LEFT JOIN mlv_orders on mlv_comment.oid=mlv_orders.id')->join('left join  mlv_user on mlv_user.id=mlv_orders.uid')->where($smp)->count();

			// dump($count);
			$comments = M('comment')->field('mlv_user.name,mlv_comment.*')->join('LEFT JOIN mlv_orders on mlv_comment.oid=mlv_orders.id')->join('left join  mlv_user on mlv_user.id=mlv_orders.uid')->where($map)->order('level desc, time desc')->limit($offset,$limit)->select();

			// echo M()->getLastSql();
			// $comments = M()->query($sql);
			// dump($comments);exit;
			foreach ($comments as $k=>$v) {

				$level = $v['level'];

				$comments[$k]['name'] = substr_cut($v['name']);

				if ($level >= 4) {

					$comments[$k]['ping'] = '好评';

				} elseif($level >= 2) {

					$comments[$k]['ping'] = '中评';

				} else {

					$comments[$k]['ping'] = '差评';
				}

				$comments[$k]['levelper'] = $level/5*72;

				$food = [];

				$oid = $v['oid'];

				$food = M('goods')->field('name')->join('mlv_order_detail on mlv_goods.id=mlv_order_detail.gid')->where("mlv_order_detail.oid=$oid")->select();

				$comments[$k]['goods'] = $food;

				$comments[$k]['count'] = $count;
			}
			// echo M()->getLastSql();
			// dump($comments);
			return $comments;
		}

		//搜索店铺
		public function searchStore()
		{
			$keywords = I('get.keywords');

			$map['status'] = array('eq', 1);

			$map['name'] = array('like','%'.$keywords.'%');

			//得到餐厅列表
			$storeList = $this->where($map)->order('clickNum desc')->select();
			// echo M()->getLastSql();
			// echo $this->getLastSql();exit;
			// dump($storeList);exit;
			
			//循环遍历插入求出来的店铺平均分数
			foreach ($storeList as $k=>$v) {

				$level = [];

				$id = $v['id'];

				$oids = M('orders')->where("sid=$id")->select();

				//初始化一个数组用于装店铺所有订单的id
				$oidArr = [];

				if ($oids) {

					foreach ($oids as $o) {
						// echo 1;
						$oidArr[] = $o['id'];

						$map['oid'] = $o['id'];
						
						$comment = M('comment')->field('level')->where($map)->find();
						// dump($comment);
						if ( empty($comment) ){

							// $level[] = 5;

						} else {

							$level[] = $comment['level'];

						}
					// dump($level);
					}
				}

				$oidStr = implode(',', $oidArr);

				//求出月销量
				if (!empty($oidStr)) {

					$sql = "SELECT count(*) FROM mlv_orders where DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= date(time) and id in ($oidStr);";

					$count = M()->query($sql)[0]['count(*)'];
					// dump($count);
					// echo M()->getLastSql();echo '<br>';

					$storeList[$k]['monthSale'] = $count;
					// dump($storeTypes);
				}
				

				// dump($oidStr);exit;

				$aregLevel = array_sum($level)/count($level);

				$storeList[$k]['level'] = number_format($aregLevel,1);

				$storeList[$k]['levelper'] = ($aregLevel/5.0)*72;

			}

			//用array_multisort方法通过月销量进行排序
			array_multisort(array_column($storeList,'monthSale'),SORT_DESC,$storeList);
			// dump($storeList);

			return $storeList;

		}

		//根据商品名搜索
		public function searchGoods()
		{
			$keywords = I('get.keywords');

			if ($keywords != '') {

				$map['name'] = ['like', '%'.$keywords.'%'];

				//搜索出所有的有关的商品
				$list = M('goods')->where($map)->select();

				if ( !empty($list) ) {

					//定义一个装所有餐厅和商品的空数组
					$goodsList = [];

					//搜出其餐厅
					foreach ($list as $k=>$v) {
						
						//同过商品id查询order_detail表统计出月销量，其中两边联查
						$sql = "SELECT sum(d.num) from mlv_order_detail d join mlv_orders o on  d.oid = o.id where DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= date(o.time) and d.gid = {$v['id']} ";


						$gcount = M()->query($sql)[0]['sum(d.num)'];
						// dump($gcount);
						// echo M()->getLastSql();echo '<br>';

						$list[$k]['monthSale'] = $gcount;
					
					}

					//按商品的月销量排序
					array_multisort(array_column($list,'monthSale'),SORT_DESC,$list);

					foreach ($list as $k=>$v) {

						//通过tid得出餐厅的id
						$sid = M('goods_type')->field('sid')->where("id={$v['tid']}")->find()['sid'];

						//通过sid查出其餐厅的信息
						if ( empty($goodsList[$sid]) ) {

							$goodsList[$sid] = M('store')->where("id=$sid")->find();
							// echo M()->getLastSql();
						}

						$goodsList[$sid]['goods'][] = $list[$k];
					}



					// dump($goodsList);exit;

					foreach ($goodsList as $key=>$v) {

						$level = [];

						$id = $v['id'];

						$oidArr = [];

						$oids = M('orders')->where("sid=$id")->select();
						// echo M()->getLastSql();
						if ($oids) {

							foreach ($oids as $o) {
								// echo 1;
								$oidArr[] = $o['id'];

								$map['oid'] = $o['id'];
								
								$comment = M('comment')->field('level')->where($map)->find();
								// dump($comment);
								if ( empty($comment) ){

									// $level[] = 5;

								} else {

									$level[] = $comment['level'];
									
								}
							// dump($level);
							}
						}

						$oidStr = implode(',', $oidArr);
						// dump( $oidStr );
						//求出餐厅月销量
						if (!empty($oidStr)) {

							$sql = "SELECT count(*) FROM mlv_orders where DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= date(time) and id in ($oidStr);";

							$count = M()->query($sql)[0]['count(*)'];
							// dump($count);
							// echo M()->getLastSql();echo '<br>';

							$goodsList[$key]['monthSale'] = $count;
							// dump($storeTypes);
						}
						
						// dump($oidStr);exit;


						$aregLevel = array_sum($level)/count($level);
						// dump($aregLevel);

						$goodsList[$key]['level'] = number_format($aregLevel,1);

						$goodsList[$key]['levelper'] = ($aregLevel/5.0)*72;
					
					}
					// dump($goodsList);
				}
			}

			array_multisort(array_column($goodsList,'level'),SORT_DESC,$goodsList);
			return $goodsList;
		}
	}