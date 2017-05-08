<?php 

	namespace MeilvAdmin\Model;

	use Think\Model;

	/**
	* 获取所有的商铺
	*/
	class StoreModel extends Model
	{
		
		//获取所有申请成功的店铺
		public function getAllStore()
		{
			$map['status'] = array(array('eq',1),array('eq',0), array('eq', 4), 'or');

			$storeList = $this->where($map)->select();

			foreach ($storeList as $k=>$v) {

				$map['id'] = $v['tid'];

				$typeList = M('store_type')->where($map)->find();

				switch ( $v['status'] ) {
					case '1':
						$storeList[$k]['statusname'] = '开业';
						break;
					
					case '0':
						$storeList[$k]['statusname'] = '休息中';
						break;

					case '4':
						$storeList[$k]['statusname'] = '已封';
						break;
					default:
						# code...
						break;
				}

				// if ($v['status'] == 1) {

				// 	$storeList[$k]['statusname'] = '开业';

				// } elseif($v[]) {

				// 	$storeList[$k]['statusname'] = '歇业';

				// }

				$storeList[$k]['typename'] = $typeList['name'];
			}
			// dump($storeList);exit;

			return $storeList;
		}

		//负责修改店铺状态
		public function edit()
		{
			$id = I('post.id');

			$status = I('post.status');

			if ($status != 4) {

				$status = 4;

			} elseif ($status == 4) {

				$status = 1;

			}
			
			$data['status'] = $status;

			$res = $this->where("id=$id")->data($data)->save();

			return $res;
		}

		//获取所有的申请的店铺
		public function getApplication()
		{
			//遍历出状态为2（申请中）或者3（拒绝的申请）的店铺
			$map['status'] = array(array('eq',2),array('eq',3), 'or');;

			$appList = $this->where($map)->select();

			$map = [];

			foreach ($appList as $k=>$v) {

				$map['id'] = $v['tid'];

				$typeList = M('store_type')->where($map)->find();

				switch ( $v['status'] ) {
					case '2':
						$appList[$k]['statusname'] = '申请中';
						break;
					
					case '3':
						$appList[$k]['statusname'] = '已拒绝';
						break;

					// case '4':
					// 	$appList[$k]['statusname'] = '已封';
					// 	break;
					default:
						# code...
						break;
				}

				// if ($v['status'] == 1) {

				// 	$storeList[$k]['statusname'] = '开业';

				// } elseif($v[]) {

				// 	$storeList[$k]['statusname'] = '歇业';

				// }

				$appList[$k]['typename'] = $typeList['name'];
			}

			return $appList;
		}

		//允许
		public function permit()
		{
			$uid = I('post.uid');

			// echo $uid;

			$sid = I('post.sid');

			$content['id'] = $sid;

			$data['status'] = 1;

			$res1 = $this->where($content)->save($data);

			$map['id'] = $uid;
			
			$data1['businessman'] = 1;

			$res2 = M('user')->where($map)->save($data1);

			if ($res1 > 0 && $res2 > 0) {
				return 1;
			} else {
				return 0;
			}


		}

		//拒绝申请
		public function refuse ()
		{
			$sid = I('post.sid');

			$content['id'] = $sid;

			$data['status'] = 3;

			$res = $this->where($content)->save($data);

			if ($res) {
				return 1;
			} else {
				return 0;
			}
		}
	}