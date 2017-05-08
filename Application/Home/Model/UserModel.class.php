<?php 

	namespace Home\Model;
	use Think\Model;
	class UserModel extends Model
	{
		/**
		 * [saveUsername 修改用户名]
		 * @return [bool] 
		 */
		public function saveUsername()
		{

			$data['id'] = I('post.id');
			$data['name'] = I('post.name');
			$res = M('user')->save($data);
			if ($res) {
				return true;
			}else{
				return false;
			}

		}

		/**
		 * [selectCollect 我的收藏]
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


		public function setStore()
		{

			// dump(I('post.'));
			$data['id'] = I('post.id');
			// dump($_FILES);

            if ( empty(I('post.phone')) ) {
                // echo 1;
                $data['msg'] = '商品号码不能为空';
                return $data;
                exit;
            }else{

                $data['phone'] = I('post.phone');
                
            }
            if ( empty(I('post.start')) || empty(I('post.stop')) ) {
                // echo 1;
                $data['msg'] = '营业时间不能为空';
                return $data;
                exit;
            }else{

                $data['start'] = I('post.start');
                $data['stop'] = I('post.stop');
                
            }

            if ( empty(I('post.upsend')) ) {
                // echo 1;
                $data['msg'] = '商品起送费不能为空';
                return $data;

                exit;
            }else{

                $data['upsend'] = I('post.upsend');
                
            }

            if ( empty(I('post.peisend')) ) {
                // echo 1;
                $data['msg'] = '商品配送费不能为空';
                return $data;
                exit;
            }else{

                $data['peisend'] = I('post.peisend');
                
            }
            
            $data['true'] = true;

            // dump($data);
           	return $data;     
		}
	} 
