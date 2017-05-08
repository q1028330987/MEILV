<?php 

	namespace MeilvAdmin\Model;

	use Think\Model;

	/**
	* 负责商品
	*/
	class GoodsModel extends Model
	{
		//商品的下架与发布
		public function editStatus()
		{
			$id = I('post.id');

			$status = $this->where("id=$id")->find()['status'];

			if ($status == 1) {
				$status = 2;
			} else {
				$status =1;
			}
			$map['status'] = $status;

			$res = $this->where("id=$id")->data($map)->save();

			return $res;
		}

		//获取某分类的所有商品
		public function getAllGoods()
		{
			//获取到传过来的分类id
			$id = I('get.id');

			$goodsList = $this->where("tid=$id")->select();

			foreach ($goodsList as $k=>$v) {
				$tid = $v['tid'];
				$goodsList[$k]['tname'] = M('goods_type')->where("id=$tid")->find()['name'];
			}

			return $goodsList;

		}	
	}