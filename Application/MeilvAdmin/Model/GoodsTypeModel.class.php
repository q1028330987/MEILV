<?php 

	namespace MeilvAdmin\Model;

	use Think\Model;

	/**
	* 
	*/
	class GoodsTypeModel extends Model
	{
		public function getAllGoodsList()
		{
			//获取商铺id
			$id = I('get.id');
			
			//查出商铺中所有分类
			$goodsTypeList = $this->where("sid=$id")->select();

			//如果分类为空直接返回空的数组
			if (empty($goodsTypeList)) {

				return $goodsTypeList;
			}

			//将查出的属于这个商铺的分类的ID放进数组用于下面查询商品
			foreach ($goodsTypeList as $v) {
				$ids[] = $v['id'];
			}

			$goodsTypeStr = implode($ids, ',');
			// dump($goodsTypeList);exit;
			$map['tid'] = array('IN', $goodsTypeStr);

			//查询这个商铺的所有商品
			
			$storeGoodsList = M('goods')->where($map)->select();
			// dump($storeGoodsList);exit;
			foreach ($storeGoodsList as $k=>$v) {
				$tid = $v['tid'];
				$storeGoodsList[$k]['tname'] = $this->where("id=$tid")->find()['name'];
			}
			// dump($storeGoodsList);exit;
			// $this->getLastSql();exit;
			//把查出的商品分类与商品放进同一数组返回
			$list = array($goodsTypeList, $storeGoodsList);
			// dump($list);exit;
			return $list;
		}

		public function getAllStoreGoods($id)
		{

		}
	}