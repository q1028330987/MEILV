<?php 

	namespace MeilvAdmin\Model;

	use Think\Model;

	class AdressModel extends Model
	{	

		protected $tableName = 'user';


		/**
		 * [addAdress 添加地址]
		 */
		public function addAdress()
		{

			// var_dump(I('post.') );

			$name = I('post.uid');

			// var_dump($name);

			$res = M('user')->where("name='$name' " )->find();

			if($res > 0 ){


				$uid = $res['id'];

				$User = M('address');

				$data['address'] = I('post.adress');

				$data['phone'] = I('post.phone');

				$data['name'] = I('post.name');

				$data['uid'] = $uid;

				$data['sex'] = i('post.sex');

				$result = $User->add($data);

				return $result;
				
			}
		}

		/**
		 * [showAdress 显示地址列表]
		 * @return [type] [description]
		 */
		public function showAdress()
		{
			// ECHO 123;
			$Model = M('user u')   //用户名
			->field('u.name uname ,u.*,a.*')
			->join('LEFT JOIN __ADDRESS__ a ON u.id = a.uid')
			->select();
			// dump($Model);
			return $Model;

		}

	}


 ?>