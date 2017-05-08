<?php
	namespace Home\Model;

	use Think\Model;

	class LoginModel extends Model
	{

		protected $tableName = 'user';

		/**
		 * [LoginExtends 判断帐号密码是否正确]
		 */
		public function LoginExtends()
		{

			$name = I('post.name');

			$pass = I('post.pass');


			$m = M('user');

			$userInfo = $m->where("name ='$name' ")->find();

			// dump($userInfo);
			
			//验证密码
			
			$bool = password_verify($pass, $userInfo['pass']);

			$id  = $userInfo['id'];

			$businessman = $userInfo['businessman'];

			$statu = $userInfo['status'];

			$att = array(

				'id'=>$id,

				'bool'=>$bool,

				'name'=>$name,

				'pass'=>$pass,

				'businessman'=>$businessman,

				'statu'=>$statu,
				);
			// dump($att);
			return $att;

		}

		public function settingPassword()
		{

			$name = I('post.name');

			$pass = password_hash(I('post.password'),PASSWORD_DEFAULT);

			

			$data['pass'] = $pass ;

			$res = M('user')->where("name='$name' ")->save($data);

			return $res;

		}


	}


