<?php  

	namespace MeilvAdmin\Model;

	use Think\Model;

	class ManagerModel extends Model
	{

		/**
		 * 
		 * [getAllAdminData 得到所有管理员数据]
		 * @return array 
		 */
		public function getAllAdminData()
		{

			$name = I('get.adminName');


    		if ( !empty($name) ) {

    			// where gname like "%$name%"
    			$search['mname'] = array('like', "%{$name}%");

    			// dump($search);
    		}
			$userList  = M('manager m')
			->Field('m.time as mtime,m.*,a.*,g.status as gstatus,g.title')
	        ->join('LEFT JOIN __AUTH_GROUP_ACCESS__ a ON m.id = a.uid LEFT JOIN __AUTH_GROUP__ g ON g.id = a.group_id')
	        ->where($search)
	        ->select();

	        //统计总条数
    		$total = count($userList);
    		// echo M('manager m')->getLastSql();
    		$page = new \Think\Page($total, 6);
    		//分页
    		$list['data'] =  M('manager m')
    		->Field('m.time as mtime,m.*,a.*,g.status as gstatus,g.title')
	        ->join('LEFT JOIN __AUTH_GROUP_ACCESS__ a ON m.id = a.uid LEFT JOIN __AUTH_GROUP__ g ON g.id = a.group_id')
	        ->where($search)
	        ->limit($page->firstRow.','.$page->listRows)
	        ->select();
	        $list['total'] = $total;
	        $list['show'] = $page->show();
	        // echo M('manager m')->getLastSql();

			return $list;

		}

		/**
		 * [saveStatus 修改管理员状态]
		 * @return [type] [description]
		 */
		public function saveStatus()
		{
			$id = I('post.id');

			// dump($id);

			$listOne = M('manager')->where("id={$id}")->find();

			// dump($listOne);

			$status['status'] = $listOne['status'] == 1? $listOne['status'] = 2: $listOne['status'] = 1;

			$res = M('manager')->where("id={$id}")->save($status);
			
			// echo M('manager')->getLastSql();
			// exit;
			// var_dump($res);
			return $res;
			// if ($res) {				
			// 	return true;
			// } else {
			// 	return false;
			// }
		}


		/**
		 * [addData 添加用户]
		 */
		public function addManager()
		{
			$model = M('manager');
			$data['mname'] = I('post.adminName');
			$data['pass'] = password_hash(I('post.password'), PASSWORD_DEFAULT);
			$role['group_id'] = I('post.adminRole');
			// dump($data);
			$flag = true;
			//启动事务
		    $model->startTrans();

		    $res = $model->data($data)->add();
		    if (!$res) {
		    	
		    	$flag = false;

		    }
		    $role['uid'] = $res;
		    // dump($model->getLastInsertId());
		    $modelRole = M('auth_group_access');
		    $res = $modelRole->data($role)->add();
		    if (!$res) {

		    	$flag = false;

		    }
		    // dump($res);

		    // 进行相关的业务逻辑操作
		    if ($flag){
		        // 提交事务
		       	$model->commit();
		       	return true;
		    }else{
		        // 事务回滚
		       	$model->rollback(); 
		       	return false;
		    }

		}

		/**
		 * [getAuthGroup 查询组]
		 * @return [type] [description]
		 */
		public function getAuthGroup()
		{
			$list = M('auth_group')->field('id,title')->select();
			return $list;
		}


		/**
		 * [saveManager 修改管理员信息]
		 * @return [type] [description]
		 */
		public function saveManager()
		{
			$model = M('manager');
			dump(I('post.'));
			// dump(I('post.id'));
			$pass = password_hash(I('post.password'), PASSWORD_DEFAULT);
			$role = I('post.adminRole');
			$uid = I('post.uid');

			$flag = true;
			//启动事务
		    $model->startTrans();

		    $res = $model->where("id=$uid")->setField('pass',$pass);
		    if (!$res) {
		    	
		    	$flag = false;

		    }
		    // dump($model->getLastInsertId());
		    $modelRole = M('auth_group_access');

		    $res = $modelRole->where("uid=$uid")->setField('group_id',$role);
		    if (!$res) {

		    	$flag = false;

		    }
		    // dump($res);

		    // 进行相关的业务逻辑操作
		    if ($flag){
		        // 提交事务
		       	$model->commit();
		       	return true;
		    }else{
		        // 事务回滚
		       	$model->rollback(); 
		       	return false;
		    }



		}

		/**
		 * [getManagerOne 获取一条管理员数据]
		 * @return [type] [description]
		 */
		public function getManagerOne()
		{

			$id = I('get.id');
			// dump($id);
			$list = M('manager m')
			->join('LEFT JOIN __AUTH_GROUP_ACCESS__ a ON m.id = a.uid')
			->find($id);

			return $list;
			// dump($list);

		}

		/**
		 * [delete 删除管理员信息]
		 * @return [type] [返回bool]
		 */
		public function delete()
		{

			$id = I('post.id');
			// dump($id);
			$model = M('manager');

			$flag = true;
			//启动事务
		    $model->startTrans();

		    $res = $model->where("id=$id")->delete();
		    if (!$res) {
		    	
		    	$flag = false;

		    }
		    // dump($model->getLastInsertId());
		    $modelRole = M('auth_group_access');

		    $res = $modelRole->where("uid=$id")->delete();
		    if (!$res) {

		    	$flag = false;

		    }
		    // dump($res);

		    // 进行相关的业务逻辑操作
		    if ($flag){
		        // 提交事务
		       	$model->commit();

		       	// echo 123123;
		       	return true;
		    }else{
		        // 事务回滚
		       	$model->rollback(); 
		       	return false;
		    }

		}

	}
