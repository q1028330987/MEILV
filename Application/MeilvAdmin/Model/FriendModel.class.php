<?php
	namespace MeilvAdmin\Model;

	use Think\Model;

	class FriendModel extends Model
	{	

		protected $tableName = 'link';

		/**
		 * [listShow 友情链接列表]
		 * @return [type] [$data]
		 */
		public function listShow()
		{

			$List = M('link');

			$data = $List->select();
			
			return $data;

		}

		/**
		 * [listLose 友情链接删除]
		 * @return [type] []
		 */
		public function listLose()
		{

			$List = M('link');

			$id = I('get.id');

			$res = $List->where("id='$id' ")->delete(); 

			return $res;
		}

		/**
		 * [listAdd 添加友情链接]
		 * @return [type] [$res]
		 */
		public function listAdd()
		{

			$name = I('post.name');

			$address = I('post.address');

			$List = M('link');

			$data['name']  = $name;

			$data['url'] = $address;

			$res = $List->add($data);

			return $res;
		}

	}


?>