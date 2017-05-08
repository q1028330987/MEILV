<?php 
namespace MeilvAdmin\Controller;

use Think\Controller;

/**
* 
*/
class StoreController extends Controller
{
	/**
	 * 显示全部的分类
	 * @return [type] [description]
	 */
	public function type_index()
	{

		$meilv =  D('store_type');

		$list = $meilv->getAllStoreType();
		// dump($list);exit;
		if (IS_AJAX) {
			$this->ajaxReturn($list);
		} else {
			
			$this->assign('list', $list);
			$this->display('store-type');
		}
	}

	/**
	 * 修改分类
	 * @return [type] [description]
	 */
	public function type_save()
	{
		
	}

	/**
	 * 添加分类
	 */
	public function type_add()
	{
		if (IS_POST) {
			$res = D('store_type')->typeAdd();
			if (!$res) {
				$this->error('添加失败');
			}
			// dump($res);
		}

		$this->display('store-type-add');

	}

	/**
	 * 删除分类
	 */
	public function type_del () {
		if (IS_AJAX) {
			$res = D('store_type')->typeDel();

			if ($res) {
				echo 1;
			} else {
				$this->error('删除失败');
			}

		}
	}

	/**
	 * 显示全部的店铺
	 * @return [type] [description]
	 */
	public function store_index()
	{
		$typeList = D('store')->getAllStore();

		$this->assign('storeList', $typeList);
		$this->display('Store/store');
		// $list = M('user')->where('id=3')->find();
	 //    	$_SESSION['userinfo'] = $list;
	}

	//负责改变商铺状态，响应点击封店开店时的AJAX
	public function editStatus()
	{
		if (IS_AJAX) {
			$res = D('store')->edit();
			if ($res == 1) {
				echo 1;
			} else {
				echo 0;
			}
		}

	}

	/**
	 * 查询属于某餐厅的所有商品
	 */
	public function goods_index()
	{

		$list = D('goods_type')->getAllGoodsList();

		$typeList = $list[0];
		$goodsList = $list[1];
		$count = count($goodsList);

		$this->assign('typeList', $typeList);
		$this->assign('count', $count);
		$this->assign('goodsList', $goodsList);
		$this->display('Store/goods-list');
	}

	//改变商品的状态
	public function goodsEditStatus()
	{
		if (IS_AJAX) {
			$res = D('goods')->editStatus();
			$this->ajaxReturn($res);
			
		}
	}

	//查询属于某分类的所有商品
	public function getAllGoods()
	{
		if (IS_AJAX) {

			$list = D('goods')->getAllGoods();

			$this->ajaxReturn($list);
			// echo 1;
		}


	}

	//处理申请店铺
	public function application()
	{

		if (IS_AJAX) {
			if (I('post.status') == 1) {
				$res = D('store')->permit();
			} else {
				$res = D('store')->refuse();
			}

			$this->ajaxReturn($res);
		}

	}
	
	//显示申请列表
	public function showApplication()
	{
		$appList = D('store')->getApplication();

		$count = count($appList);

		$this->assign('count', $count);

		$this->assign('storeList', $appList);

		$this->display('Store/application');
	}
	
	//修改分类
	public function editTypeName()
	{

		if (IS_AJAX) {
			// echo 1;
			// exit;
			$res = D('store_type')->typeEditName();

			$this->ajaxReturn($res);
		}
	}

}


 ?>