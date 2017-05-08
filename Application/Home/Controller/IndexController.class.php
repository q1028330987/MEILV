<?php 

	namespace Home\Controller;

	use Think\Controller;

	/**
	* 负责首页的一些
	*/
	class IndexController extends Controller
	{
		
		//首页
		public function index ()
		{
			// dump($_SESSION);
			
			$typeList = M('store_type')->select();

			$storeList = D('store')->getAllStore();
			// $storeList = M('store')->select();
			// dump($storeList);exit;
			
			$id = I('get.id');

			//这里是传友情链接
			$data = M('link');

			$res = $data->select();

			// echo 11;

			$this->assign('list',$res);

			//这里是传友情链接结束

			$this->assign('storeList', $storeList);

			$this->assign('selected', $id);

			$this->assign('typeList', $typeList);

			$this->display('Index/index1');
		}

		//
		// public function storeType () {
		// 	D('store')->getAllStore();
		// }

		//主页加载更多的餐厅
		public function ajaxIndex()
		{
			if (IS_AJAX) {

				$storeList = D('store')->getAllStore();

				$this->ajaxReturn($storeList);
			}
		}

		//搜索餐厅
		public function search()
		{
			// echo I('get.keywords');
			$storeList = D('store')->searchStore();

			$keywords = I('get.keywords');
			// dump($storeList);

			$this->assign('keywords', $keywords);

			$this->assign('type', 'store');

			$this->assign('storeList', $storeList);

			$this->display('Index/search');

		}

		//搜索美食
		public function searchgoods()
		{
			$goodsList = D('store')->searchGoods();
			// dump($goodsList);
			
			$keywords = I('get.keywords');

			$this->assign('type', 'goods');

			$this->assign('keywords', $keywords);

			$this->assign('goodsList', $goodsList);
			
			$this->display('Index/search');
		}
	}