<?php 

	namespace MeilvAdmin\Model;

	use Think\Model;

	/**
	* 这个类负责处理餐厅的分类和菜单
	*/
	class StoreTypeModel extends Model
	{

		/**
		 * [用来查询餐厅的分类]
		 * @return [array] [返回餐厅的分类的数组]
		 */
		public function getAllStoreType()
		{
			// exit;
			// Protected $autoCheckFields = false;
			// $meilv = M();

			$store_type = $this->select();
			// var_dump($store_type);exit;

			return $store_type;
		}

		/**
		 * 处理添加分类
		 */
		public function typeAdd()
		{
			if (empty($_POST['name'])) {
				$this->error('请输入一个分类名');
			}
			$name = $_POST['name'];

			$map['name'] = $name;

			$reslist = $this->where($map)->select();
			// dump($reslist);
			if ($reslist) {
				$this->error('分类已存在');
			}
			$data = $_POST;
			$res = $this->add($data);
			return $res;
			
		}

		/**
		 * 用于处理删除分类
		 */
		public function typeDel()
		{
			$id = I('get.id');

			$res = $this->delete($id);

			return $res;
		}

		/**
		 * 用于修改分类名
		 * @return [int] [返回修改成功与否]
		 */
		public function typeEditName()
		{
			$name = I('post.name');

			$id = I('post.id');

			$data['name'] = $name;

			$map['id'] = $id;

			$res = $this->where($map)->save($data);
			
			// echo M()->getLastSql();
			return $res;

		}
	}