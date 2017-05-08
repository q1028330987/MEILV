<?php
namespace Home\Controller;
use Think\Controller;
class OrdersController extends CommonController 
{
    /**
     * [saleOrders 显示卖家的订单]
     * @return [type] [description]
     */
    public function saleOrders()
    {
    	// $list = M('user')->where('id=3')->find();
    	// $_SESSION['userinfo'] = $list;
        //dump($_SESSION);
        $where = ['id'=>$_SESSION['userinfo']['id']];
        $userinfo = M('user')->where($where)->find();
    	if ($userinfo['businessman'] == 2) {
    		# code...
    		// $info = '<span style="font-size: 16px;">您还没有开通店铺<a class="cc-lightred-new" href="">立即申请</a></span>';
    		$info = false;
    	}else {
    		$info = D('Orders')->getOrders($_SESSION['userinfo']['id']);
    	}

    	$this->assign('info', $info);
        $this->display();
    }

    /**
     * [index 显示买家的订单]
     * @return [type] [description]
     */
    public function index()
    {
        // dump($_SESSION);
        $list = D('Orders')->getBuyOrders($_SESSION['userinfo']['id']);
        $show = $list['show'];
        unset($list['show']);
        if (empty($list)) {
        	$list = false;
        }
        $this->assign('list', $list);
        $this->assign('show', $show);
        $this->display();

    }

    /**
     * [ajaxChangeOrderStatus 此方法通过ajax访问，用来改变订单状态]
     * @return [type] [description]
     */
    public function ajaxChangeOrderStatus()
    {
        if (IS_AJAX) {
            // echo I('post.oid');
            $where = ['id'=>I('post.oid')];
            $status = M("orders")->field('status')->where($where)->find();
            switch ($status['status']) {
                case '0':
                    $data['status'] = 1;
                    $bool = M('orders')->where($where)->save($data);
                    $map['content'] = '等待确认收货';
                    if ($bool) {
                    $this->ajaxReturn($map);
                    
                    // echo '1000';
                    }
                    break;
                case '1':
                    $data['status'] = 2;
                    $bool = M('orders')->where($where)->save($data);
                    $map['content'] = '评论';
                    if ($bool) {
                    $this->ajaxReturn($map);
                    
                    }
                    break;
                default:
                    # code...
                    $this->ajaxReturn('error');
                    break;
            }
            
        }
    }

    /**
     * [ordersRate 评论订单]
     * @return [type] [跳转]
     */
    public function ordersRate()
    {
    	// dump(I('post.'));
    	$bool = D('Orders')->ordersRate();
    	if ($bool) {
    		$this->success('评论成功',U('Orders/index'));
    	} else {
    		$this->error('评论失败',U('Orders/index'));
    	}

    }

    /**
     * [myRate 为评论页面分配数据]
     * @return [type] [description]
     */
    public function myRate()
    {
    	$list = D('Orders')->getMyRate();
    	$show = $list['show'];
    	unset($list['show']);
    	$this->assign('list', $list);
    	$this->assign('show', $show);
    	$this->display();
    }

    public function ajaxDeleteRate()
    {
    	if (IS_AJAX) {
    	 	$id = I('post.id');
    	 	$where = ['id'=>$id];
    	 	$bool = M('comment')->where($where)->delete();
    	 	if ($bool) {
    	 		$this->ajaxReturn('1');
    	 	} else {
    	 		$this->ajaxReturn('0');
    	 	}
    	}
    }
}