<?php  

	namespace MeilvAdmin\Model;

	use Think\Model;

	class AuthGroupModel extends Model
	{

		/**
		 * 
		 * [getAllAdminData 得到所有管理员数据]
		 * @return array 
		 */
		public function getAllAdminData()
		{


			$groupList  = M('auth_group a')
			->field('a.title atitle ,a.*')
	        ->select();
	        // dump($groupList);
	        /**
	         * 把ID变成对应的权限名称
	         */
	        // $where = "select rules from mlv_auth_group";
	        // dump($where);
	        // echo M('auth_rule a')->getLastSql();
	        foreach ($groupList as $key => $value) {
	        	// dump($value);
		        $where = 'id in('.$value['rules'].')';
		        $role= M('auth_rule a')->field('title')->where($where)->select();
		        // dump($role);
		        //二维数组变成一维数组
		        $roles = array_column($role, 'title');
				// dump($roles);
				$list = implode(',',$roles);
				// dump($list);
		  		$groupList[$key]['title']=$list;
				// dump($groupList);
	        }
	        // dump($list);
	        // dump($groupList);
			return $groupList;

		}

		/**
		 * [addRole 添加角色]
		 */
		public function addRole()
		{

			$data['rules'] = I('post.items');
			$data['title'] = I('post.name');
			// dump($data);
			// var_dump($data);
			if ($data['title'] && $data['rules']) {
				// var_dump($data);
				$res = M('auth_group')->data($data)->add();
				// var_dump($res);
				if ($res) {

					return true;

				}else{

					return false;

				}
			} else {

				return false;

			}

		}

		/**
		 * [saveRole 修改时查询角色权限]
		 * @return [type] [description]
		 */
		public function saveRole()
		{
			// dump(I('get.id'));
			$id = I('get.id');

			$arr['admin'] = M('auth_group')->where("id=$id")->find();

			$list = M('auth_rule_classify')->select();

			$list = array_column($list, 'name', 'id');
			// dump($list);
			foreach ($list as $key => $value) {

				$arr['data'][$value] = M('auth_rule')->field('title,cid,id')->where('cid='.$key)->select();
				// $list[$key]=$arr;
				// dump($arr);
				// $arr = array_column($arr, 'title');
			}
			// dump($arr);
			return $arr;

		}

		public function saveAdminRole()
		{

			$data['rules'] = I('post.items');

			if (I('post.name') != '') {
				
				$data['title'] = I('post.name');

			}
			$data['id'] = I('post.id');
			
			$res = M('auth_group')->save($data);
			// echo M('auth_group')->getLastSql();
			// dump($res);
			if ($res) {
				return true;
			}else{
				return false;
			}

		}


		public function deleteAdmin()
		{
			$id = I('post.id');
			$res = M('auth_group')->delete($id);
			if ($res) {
				return true;
			}else{
				return false;
			}
		}


	}