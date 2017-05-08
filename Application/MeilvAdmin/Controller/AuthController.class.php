<?php
namespace MeilvAdmin\Controller;

use Think\Controller;

/**
 * 负责权限的类
 */

class AuthController extends CommonController 
{


    /**
     * [adminRole 加载role页面]
     * @return [type] [description]
     */
    public function adminRole()
    {
        $list = D('auth_group')->getAllAdminData();
        // dump($_SESSION['admin']);
        // dump($list);

        $this->assign('list',$list);

    	$this->display('admin-role');  

    }

    /**
     * [adminPermission 加载权限组页面]
     * @return [type] [description]
     */
    public function adminPermission()
    {

        $list = D('auth_rule')->selectRule();

        // echo M('auth_rule')->getLastSql();
        // dump($list);
        $this->assign('list',$list['data']);
        $this->assign('pageBtn', $list['show']);

    	$this->display('admin-permission');

    }
    /**
     * [adminAdd 添加角色]
     * @return [type] [description]
     */
    public function adminAdd()
    {

    	if (IS_POST) {

            $res = D('auth_group')->addRole();
            if ($res) {
                $this->success("修改成功",U("Auth/adminRole"),3);
            }else{
                echo 0;
            }
    		
    	} else {

    		$list = D('auth_rule')->selectAdminRule();
    		// dump($list);
    		$this->assign('list',$list);
    		$this->display('admin-role-add');

    	}

    }
    /**
     * [adminSave 修改角色权限]
     * @return [type] [description]
     */
    public function adminSave(){
        if (IS_POST) {
            
            $res = D('auth_group')->saveAdminRole();
            if ($res) {
                echo 1;
            }else{
                echo 0;
            }

        } else {
            // dump(I('get.id'));
            $list = D('auth_group')->saveRole();
            // dump($list);
            $this->assign('admin',$list['admin']);
            $this->assign('list',$list['data']);
            $this->display('admin-role-save');        
        }
    }


    public function deleteAdmin()
    {   

        // dump(I('post.id'));
        // $id = I('post.id');
        $res = D('auth_group')->deleteAdmin();
        if ($res) {
            echo 1;
        }else{
            echo '删除失败';
        }

    }
    

}