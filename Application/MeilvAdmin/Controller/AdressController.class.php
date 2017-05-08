<?php  
	
	namespace MeilvAdmin\Controller;

	use Think\Controller;

	class AdressController extends  Controller{

		public function showAdress()
		{


				$data = D('Adress')->showAdress();
				// dump($data);
				// dump($data['uid']);
				$this->assign('list',$data);
				$this->display();


		}

		public function addAdress()
		{

			if(IS_POST){

				$data = D('Adress')->addAdress();

				if($data > 0){

					$this->success('添加成功');

					exit;
				}else{

					$this->error('没有此用户名');

					exit;
				}

			}else{

				$this->display();

			}

		}


	}

?>















