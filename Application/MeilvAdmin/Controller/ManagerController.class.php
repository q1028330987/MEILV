<?php
namespace MeilvAdmin\Controller;

use Think\Controller;

class ManagerController extends CommonController 
{
    /**
     * [adminList 获取所有管理员信息]
     * @return [type] [description]
     */
    public function adminList()
    {

        if (IS_AJAX) {

            // dump(I('post.'));

        } else {

            $list = D('manager')->getAllAdminData();
            // dump($list);

            $this->assign('list',$list['data']);
            $this->assign('pageBtn', $list['show']);
            $this->assign('total', $list['total']);
            $this->display('admin-list');

        }

    }


    /**
     * [saveManager 修改管理员信息]
     * @return [type] [description]
     */
    public function saveManager()
    {

        if (IS_POST) {

            $res = D('manager')->saveManager();
            dump($res);

            if ($res) {

                echo 1;

            } else {

                echo 2;

            }

        } else {
            $getAuthGroup = D('manager')->getAuthGroup();

            $this->assign('getAuthGroup',$getAuthGroup);

            $list = D('manager')->getManagerOne(); 

            // dump($list); 

            $this->assign('list',$list);
            $this->display('admin-save');

        }

    }

    /**
     * [del 删除管理员]
     * @return [type] [description]
     */
    public function delete()
    {

        $res = D('manager')->delete();

        // var_dump($res);exit;

        // echo M('manager')->getLastSql();

        if ($res) {

            echo 1;

        } else {

            echo 0;

        }

    }


    /**
     * [addManager 添加管理员]
     */
    public function addManager()
    {

        if (IS_POST) {

            $res = D('manager')->addManager();
            dump($res);
            if ($res) {

                echo 1;

            } else {

                echo 2;

            }

        } else {

            $list = D('manager')->getAuthGroup();
            $this->assign('list',$list);
            $this->display('admin-add');
        }


    }

    /**
     * [status 修改管理员状态]
     * @return [type] [description]
     */
    public function status()
    {


            $res = D('manager')->saveStatus();

            $this->ajaxReturn($res);


    }

}