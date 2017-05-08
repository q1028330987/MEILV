<?php
	namespace MeilvAdmin\Model;

	use Think\Model;

	class UserModel extends Model
	{	

		protected $tableName = 'user';


		//字段映射，就可以让表单的name与数据表的字段建立关系
		protected $_map = array(

			//把表单中username映射到数据表的name字段
			'username' => 'name',
			
		);

		//使用自动完成
		protected $_auto  = array(
			//会自动调用myHash()方法，然后将myHash的返回的结果插入到数据库
			array('pass', 'myHash', 1, 'callback'),
			array('name',"I('post.name')",'function'),
			array('phone',"I('post.phone')",'function'),
			array('sex',"I('post.sex')",'function'),
		
		);

		//自动验证，这个规则当使用create()方法时才会被调用
		
		protected $_validate = array(

			//如果定义了字段映射的话，第一个是数据表的字段名
			array('name','','用户名已存在',1,'unique'),
			array('name', 'require', '用户名不能为空'),
			array('pass', 'require', '密码不能为空'),
			array('phone', 'require', '手机号码不能为空'),
			array('email','require','邮箱不能为空'),

			//当做字段映射，pass得是数据表的字段
			array('pass', 'pass2', '密码不一致',0,'confirm'), // 验证确认密码是否和密码一致

			//用户名不能包含特殊字符
			array('name', '/^\w{1,12}$/', '用户名不能包含特殊字符'),

			 
		);

		protected function myHash()
		{
			return password_hash(I('post.pass'), PASSWORD_DEFAULT);
		}

		/**
		 * [del 删除会员]
		 * @return [type] [ajax]
		 */
		public function del()
		{

			$id = I('post.id');

			$User = M('user');

			$res = $User->delete($id);

			return $res;

		}

		/**
		 * [index 显示会员管理中的会员列表]
		 * @return [type] [data]
		 */
		public function index()
		{

			$User = M('user');

			$data = $User->select();

			return $data;

		}

		/**
		 * [userPassword 修改用户名密码]
		 * @return [type] [description]
		 */
		public function change_password()
		{

			$id = I('get.id');

			$name = I('post.newpassword');

			$name1 = I('post.pass2');

			if($name ==$name1){

			$User = M('user');

			$data['pass'] = password_hash($name,PASSWORD_DEFAULT);

			$res = $User->where("id=$id")->save($data);

			// var_dump($User->getLastSQL());

			return $res;

			}


		}

		/**
		 * [start 处理禁用]
		 * @return [type] [$res]
		 */
		public function start()
		{

			$id = I('post.id');

			$User = M('user');

			$data = $User->where("id = '$id' ")->find();

			// dump($data);

			$status = $data['status'];
			// dump($status);

			if($status ==1 ){

				$dataOne['status'] =2;

				$res = $User->where("id = '$id' ")->save($dataOne);

				// dump($res);

				return 1;  

			}elseif ($status ==2 ) {
				
				$dataOne['status'] =1;

				$res = $User->where("id = '$id' ")->save($dataOne);

				return 2; 
			}

			// return $status;
		}



	}



?>