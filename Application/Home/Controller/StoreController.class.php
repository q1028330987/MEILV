<?php 

	namespace Home\Controller;

	use Think\Controller;

	/**
	* 
	*/
	class StoreController extends Controller
	{
		//餐厅详情页
		public function store() 
		{
			// dump($_SESSION['userinfo']);
			// unset($_SESSION['userinfo']);
			
			if ( !empty($_SESSION['userinfo']) ) {
				$uid = $_SESSION['userinfo']['id'];
				$sid = I('get.id');
				$res = M('collect')->where("uid=$uid AND sid=$sid")->find();
				// echo 1;
				// echo M()->getLastSql();
				if ($res) {
					$this->assign('collect', 1);
				}
			}
			// session('userinfo["name"]', '1');
			// if ( empty($session['userinfo']) ) {}

			$storeInfoList = D('store')->getStore();
			$storeTypes = D('store')->getAllFood();

			
			
			$this->assign('storeInfoList', $storeInfoList);
			$this->assign('storeTypes', $storeTypes);
			$this->display('Index/store');


		}

		//评论
		public function comments()
		{

			$storeInfoList = D('store')->getStore();
			$count = D('store')->getLevel();
			// dump($count);
			$comments = D('store')->getComments();
			if (IS_AJAX) {
				// dump($comments);
				$this->ajaxReturn($comments);
			} else {
				$this->assign('count', $count);
				$this->assign('comments', $comments);
				$this->assign('storeInfoList', $storeInfoList);
				$this->display('Index/comments');
			}
			// dump($comments);
			// $comments = $all[0];
			// $count = $all[1];
			// dump($comments);
			
		}

		//收藏
		public function collect () {
			if ( !empty($_SESSION['userinfo']['id']) ) {

				$status = I('get.status');

				$sid = I('get.sid');

				$uid = $_SESSION['userinfo']['id'];

				if ($status == 1) {
					$data['sid'] = $sid;
					
					$data['uid'] = $uid;

					$res = M('collect')->add($data);
				} elseif($status == 0) {
					$res = M('collect')->where("uid=$uid AND sid=$sid")->delete();
				}


				$this->ajaxReturn($res);

			}
		}
	}