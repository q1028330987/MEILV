<?php 

	namespace Home\Model;
	use Think\Model;
	class GoodsModel extends Model
	{
	
		/**
		 * [getUserStore 查询我的店铺信息]
		 * @param  [type] $uid [description]
		 * @return [type]      [description]
		 */
		public function getUserStore($uid)
		{

			$id = I('get.id');
			// dump($id);

			// echo '查询店铺';
			$list['store'] = M('store s')->where('uid='.$uid)->find();

			$list['goodsType'] = M('goods_type')->where('sid='.$list['store']['id'])->select();

			if (empty($id)) {
				// dump($value);
				$goodsData = M('store s')
						   ->join('LEFT JOIN __GOODS_TYPE__ t ON t.sid = s.id')
						   ->join(' __GOODS__ g ON g.tid = t.id')
						   ->where('s.uid='.$uid)
						   ->order('g.status,g.id desc')
						   ->select();

				$list['goodsData'] = $goodsData;

			}else{
			foreach ($list['goodsType'] as $key => $value) {
					// dump($value);
					// echo 111;
					$goodsData = M('goods')->where('tid='.$id)->select();			

				}
					$list['goodsData'] = $goodsData;
			}
				// dump($goodsData);
				// echo M('store s')->getLastSQL();
				// dump($list['goodsData']);
			// dump($list);
			return $list;

		}


		/**
		 * [selectCollect 查询我的收藏]
		 * @param  [type] $uid [description]
		 * @return [type]      [description]
		 */
		public function selectCollect($uid)
		{

			$list = M('collect c')
					->field('c.sid,s.pic,s.name,c.uid,s.peisend,s.atime,s.upsend')
					->where("c.uid=".$uid)
					->join('LEFT JOIN  __STORE__ s ON s.id = c.sid')
					->select();

			foreach ($list as $key=>$value) {
				$level = [];
				$orders = M('orders')
						->where('sid='.$value['sid'])
						->select();
					// dump($orders);
				foreach ($orders as $o) {
					
					$comment = M('comment')
							->where('oid='.$o['id'])
							->find();
					if ($comment['level'] == null) {
						$level[] = 5;
					}else{
						$level[] = $comment['level'];
					}
					// dump($comment);
		
				}
					// dump($level);
				// dump(array_sum($level)/count($level));
				$list[$key]['level'] = number_format(array_sum($level)/count($level),1);
				$list[$key]['levelData'] = $list[$key]['level']/5*72;
			// dump($level);
			}
			// dump($list);
			return $list;
		}


		public function goodsTest()
		{

			$data['true'] = false;

			if (I('post.tid') == '0') {
				$data['msg'] = '分类不能为空';
                return $data;
                exit;
            }else{
                $data['tid']=I('post.tid');
            }
            // $goodsModel->pic = $data['pic'];

            if ( empty(I('post.name')) ) {
                // echo 1;
                $data['msg'] = '商品名不能为空';
                return $data;
                exit;
            }else{

                $data['name'] = I('post.name');
                
            }

            if ( empty(I('post.des')) ) {
                // echo 1;
                $data['msg'] = '商品描述不能为空';
                return $data;
                exit;
            }else{

                $data['des'] = I('post.des');
                
            }

            if ( empty(I('post.price')) ) {
                // echo 1;
                $data['msg'] = '请正确输入价格' ;
                return $data;
                exit;
            }else{

                $data['price'] = I('post.price');
                
            }

            $data['true'] = true;

            // dump($data);
            return $data;

		}
	} 
