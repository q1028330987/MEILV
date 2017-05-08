<?php
namespace Home\Controller;

use Think\Controller;

class ManStoreController extends CommonController 
{

    /**
     * [storeApplication 判断+申请商铺]
     * @return [type] [description]
     */
    public function storeApplication()
    {

        if (IS_POST) {
            // dump(I('post.'));
            // dump($_FILES);
            // $_SESSION['userinfo']['id'] = 3;

            if ( !empty($_FILES['photo']['name']) ) {

                $fileInfo = $this->uploadOne($_FILES['photo']);

                if ( $fileInfo['code'] ==404 ) {


                	$this->error($fileInfo['msg']);
                  exit;
                }

                $data = I('post.');
                $data['pic']  = ltrim($fileInfo['msg'],'./');
                $data['uid'] = $_SESSION['userinfo']['id'];
            }else{

                $this->error('店铺相册不能为空');
                exit;

            }
            // dump($data);

            //判断店铺分类
            if (I('post.storetype') == '0') {
                // echo 1;
                $this->error('店铺分类不能不选');
                exit;
            }else{

                $data['tid'] = I('post.storetype');

            }

            if ( empty(I('post.storename')) ) {
                // echo 1;
                $this->error('店铺名不能为空');
                exit;
            }else{

                $data['name'] = I('post.storename');

            }

            if ( empty(I('post.address')) ) {
                // echo 1;
                $this->error('店铺名地址不能为空');
                exit;
            }else{

                $data['address'] = I('post.address');
                
            }

            if ( empty(I('post.phone')) ) {
                // echo 1;
                $this->error('店铺号码不能为空');
                exit;
            }else{

                $data['phone'] = I('post.phone');
                
            }
            $data['status'] = 2;
            // dump($data);
            $res = M('store')->add($data);
            if ($res) {

                $this->success('恭喜您申请成功，等耐心等待审核',U('Index/index'));
            }else{
                $this->error('申请失败，请重新提交！');
            }

            // dump($res);
        }else{

            // $_SESSION['userinfo']['id'] = 4;

            $res = M('store')->where('uid='.$_SESSION['userinfo']['id'])->find();
            $list = M('store_type')->select();
            // dump($list);
            // dump($res);
            if ($res['status'] == 2) {
              
              $list = 2;

            }elseif ($res['status'] == 3) {
              
              $list = 3;

            }
            $this->assign('list',$list);
            $this->display('storeSignIn');

        }

    }

    /**
     * [uploadOne 单文件上传类]
     * @param  [type] $files [description]
     * @return [type]        [description]
     */
    protected function uploadOne($files)
    {

        $upload = new \Think\Upload();

        $upload->maxSize = 3145728;

        // 设置附件上传类型
        $upload->exts   =   array('jpg', 'gif', 'png', 'jpeg');

        //设置根目录
        $upload->rootPath = './Public/';

        // 设置附件上传目录
        $upload->savePath  = './Uploads/'; 
        // dump($files);

        $info   =   $upload->uploadOne($files);
        // dump($info);
        if (!$info) {

            //上传失败
            return array(
                'msg' => $upload->getError(),
                'code' => 404
            );
            // dump($upload->getError());
        } else {


            return array(
                'msg' => $info['savepath'].$info['savename'],
                'code' => 200
            );
            
            // dump($info);
        }

        // dump($info);

    }


    /**
     * [addGoods 添加商品]
     */
    public function addGoods()
    {

        if (IS_POST) {
            
            $data = D('Goods')->goodsTest();
            // dump($data);

            if($data['true']){

              if ( !empty($_FILES['pic']['name']) ) {

                $fileInfo = $this->uploadOne($_FILES['pic']);

                if ( $fileInfo['code'] ==404 ) {


                  $this->error($fileInfo['msg']);
                  exit;
                }
                $data['pic']  = ltrim($fileInfo['msg'],'./');
              }else{

                $this->error('图片不能为空');
                exit;
              }

  		        $goodsModel = D('Goods')->data($data)->add();
  		        if (!$goodsModel) {

  		            $this->error('添加失败');
  		            exit;
  		        }

  		        $this->success('添加成功', U('User/userStore'),2);

            }else{

            	$this->error($data['msg'],U('User/userStore'),2);
            }


        }else{
            $uid = $_SESSION['userinfo']['id'];
            $list = M('store')->where('uid='.$uid)->find();
            $data = M('goods_type')->where('sid='.$list['id'])->select();
            // dump($data);
            $this->assign('list',$data);
            $this->display();

        }

    }

    /**
     * [stop 下架商品]
     * @return [type] [description]
     */
    public function stop()
    {

    	// $this->error('修改失败',U('User/userStore'));
    	// $this->success('修改成功',U('User/userStore'));
    	$data['status'] = 2;
    	$res = M('goods')->where('id='.I('post.id'))->save($data);
    	// dump($res);
    	if ($res) {
    		echo 1;
    	}else{
    		$this->error('修改失败',U('User/userStore'),2);
    	}
    }
    /**
     * [start 上架商品]
     * @return [type] [description]
     */
    public function start()
    {

    	$data['status'] = 1;
    	$res = M('goods')->where('id='.I('post.id'))->save($data);
    	// dump($res);
    	if ($res) {
    		echo 1;
    	}else{
    		$this->error('修改失败',U('User/userStore'),2);
    	}
    }
    /**
     * [del 删除商品]
     * @return [type] [description]
     */
    public function del()
    {

    	// dump(I('get.id'));
      $pic = M('goods')->where('id='.I('post.id'))->find(); 

      $str =PRO."/Public/".$pic['pic'];
      
      $res = M('goods')->where('id='.I('post.id'))->delete();
      if ( unlink($str) &&$res) {
    		echo 1;

    	}else{

   			echo 0;

    	}
    }


  	/**
  	 * [saveGoods 修改商品]
  	 * @return [type] [description]
  	 */
      public function saveGoods()
      {

          if (IS_POST) {
              
          	// dump(I('post.'));
          	// dump($_FILES);
          	// $data = I('post.');
        	 	$data = D('Goods')->goodsTest();
        	 	// $data['id'] = I('post.id');
        	 	// dump($data);
        	 	// dump($data['true']);
        	 	if ($data['true']) {

        	 		if ( !empty($_FILES['pic']['name']) ) {

                $fileInfo = $this->uploadOne($_FILES['pic']);

                  if ( $fileInfo['code'] ==404 ) {

  	                $this->error('上传文件失败');
  	                exit;
                  }
                  $data['pic']  = ltrim($fileInfo['msg'],'/');
        	 		}

        	 		$data['id'] = I('post.id');
        	 		$goods = M('goods')->where('id='.$data['id'])->find();
        	 		// dump($goods);
        	 		// dump($data['pic']);
        	 		if ($data['id']==$goods['id']&&$data['name']==$goods['name']&&$data['price']==$goods['price']&&$data['des']==$goods['des']&&$data['tid']==$goods['tid']&&$data['pic'] == '') {

        	 			$this->error('你啥都没改哦！',U('User/userStore'),2);


        	 		}else{

        	 			$res = M('goods')->save($data);

        	 			if ($res) {
        	 				$this->success('修改成功',U('User/userStore'),2);

        	 			}else{

        	 				$this->error('修改失败',U('User/userStore'),2);
        	 			}

        	 		}
        	 	}else{

        	 		$this->error($data,U('User/userStore'),2);
        	 		
        	 	}

          }else{
              
          	$list = M('store')->where('uid='.$_SESSION['userinfo']['id'])->find();
         		$data = M('goods_type')->where('sid='.$list['id'])->select();
         		$goods = M('goods')->where('id='.I('get.id'))->find();
         		$this->assign('goods',$goods);
            $this->assign('list',$data);
            $this->display();

          }

      }


      /**
       * [goodsType 添加分类]
       * @return [type] [description]
       */
      public function goodsType()
      {

        if (IS_POST) {
          # code...
        }else{


          $sid = M('store')->where('uid='.$_SESSION['userinfo']['id'])->field('id')->find();
          $list = M('goods_type')->where('sid = '.$sid['id'])->select();
          // dump($list);
          // dump($sid);
          $this->assign('list',$list);
          $this->assign('sid',$sid['id']);
          $this->display();

        }

      }


      /**
       * [setStore 设置商铺信息]
       */
    public function setStore()
    {

      if (IS_POST) {
        // dump($_FILES);
        // dump(I('post.'));
        $data = D('User')->setStore();

        if (I('post.atime') == '') {
          
          $this->error('最好设置下配送时间');

        }

        $data['atime'] = I('post.atime');
        if ( !empty($_FILES['pic']['name']) ) {

          $fileInfo = $this->uploadOne($_FILES['pic']);

          if ( $fileInfo['code'] ==404 ) {


            $this->error('上传文件失败');
            exit;
          }
          $data['pic']  = ltrim($fileInfo['msg'],'/');
        }
        // dump($data['true']);
        // dump($data);
        if ($data['true'] == true) {
          $setStore = D('store')->save($data);
          
          if (!$setStore) {

              $this->error('修改失败');
              // $this->error($data,U('User/userStore'),2);
              exit;
          }

          $this->success('修改成功', U('User/userStore'),2);
        }else{

          $this->error($data['msg'],U('User/userStore'),2);

        }

      }else{
          $userinfo = M('user')->where('id='.$_SESSION['userinfo']['id'])->find();

          if ($userinfo['businessman'] == 2) {

            $this->error('请正确操作',U('User/userStore'));
            exit;

          }else {

            $info = D('goods')->getUserStore($_SESSION['userinfo']['id']);

          }

          // dump($info);
          $this->assign('info',$info['store']);
          $this->display();

      }

    }

    /**
     * [stopStore 休业中]
     * @return [type] [description]
     */
    public function stopStore()
    {

      // dump(I('post.'));
      $data['id'] = I('post.id');
      $data['status'] = 0;
      $res = M('store')->save($data);
      // dump($data);
      if ($res) {
        echo 1;
      }else{
        echo 0;
      }

    }


    /**
     * [startStore  开店]
     * @return [type] [description]
     */
    public function startStore()
    {

      $data['id'] = I('post.id');
      $data['status'] = 1;
      $res = M('store')->save($data);
      // dump($res);
      if ($res) {
        echo 1;
      }else{
        echo 0;
      }

    }


    public function setApply()
    {

      if (IS_POST) {

        // dump(I('post.'));

        $data = D('User')->setStore();
        if ( !empty($_FILES['pic']['name']) ) {

          $fileInfo = $this->uploadOne($_FILES['pic']);

          if ( $fileInfo['code'] ==404 ) {


            $this->error('上传文件失败');
            exit;
          }
          $data['pic']  = ltrim($fileInfo['msg'],'/');
        }

        $data['status'] = 2;

        if (empty(I('post.name'))) {
          $this->error('店铺名不能为空');
          exit;
        }
        $data['name'] = I('post.name');

        // dump($data['true']);
        // dump($data);
        if ($data['true'] == true) {
          $setStore = D('store')->save($data);
          
          if (!$setStore) {

              $this->error('修改失败');
              // $this->error($data,U('User/userStore'),2);
              exit;
          }

          $this->success('修改成功', U('User/userStore'),2);
        }else{

          $this->error($data['msg'],U('User/userStore'),2);

        }

      }else{

        $info = D('goods')->getUserStore($_SESSION['userinfo']['id']);

        // dump($info);
        $this->assign('info',$info['store']);

        $this->display();

      }

    }
}