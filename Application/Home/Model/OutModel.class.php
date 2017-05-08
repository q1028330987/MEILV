<?php 

	namespace Home\Model;
	use Think\Model;
	class OutModel extends Model
	{
		
		protected $tableName = 'user';

		public function userPass()
		{

			$User = M("user"); 

			$id = $_SESSION['userinfo']['id'];

			$pass1 = I('post.pass');

			// dump($pass1);

			$pass = password_hash($pass1,PASSWORD_DEFAULT);

			// dump($pass);

			$data['pass'] = $pass;

			$res = $User->where("id ='$id' ")->save($data);

			return $res;

		}

	}

?>