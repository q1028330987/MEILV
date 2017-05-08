<?php  

	namespace MeilvAdmin\Model;

	use Think\Model;

	class AuthRuleModel extends Model
	{

		/**
		 * 
		 * [getAllAdminData 得到所有权限数据]
		 * @return array 
		 */
		public function selectRule()
		{

			$list = M('auth_rule r')
			->field('r.name rname ,r.*,c.name')
			->join('LEFT JOIN __AUTH_RULE_CLASSIFY__  c ON r.cid = c.id')
			->select();
			//统计总条数
    		$total = count($list);
    		// echo M('manager m')->getLastSql();
    		$page = new \Think\Page($total, 5);
    		//分页
    		$list['data'] = M('auth_rule r')
			->field('r.name rname ,r.*,c.name')
			->join('LEFT JOIN __AUTH_RULE_CLASSIFY__  c ON r.cid = c.id')
			->limit($page->firstRow.','.$page->listRows)
	        ->select();
	        $list['show'] = $page->show();
			return $list;

		}
		/**
		 * [selectAdminRule 添加时查询所有权限选项]
		 * @return [type] [description]
		 */
		public function selectAdminRule()
		{

			$list = M('auth_rule_classify')
			->select();
			$list = array_column($list, 'name', 'id');
			// dump($list);
			foreach ($list as $key => $value) {

				$arr[$value] = M('auth_rule')->field('title,cid,id')->where('cid='.$key)->select();
				// $list[$key]=$arr;
				// dump($arr);
				// $arr = array_column($arr, 'title');
			}

			// dump($arr);
			return $arr;
		}


	}