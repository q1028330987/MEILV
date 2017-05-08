<?php 

	namespace Home\Model;
	use Think\Model;

	include_once('class.phpmailer.php');

	include_once('class.smtp.php');
	class RegisterModel extends Model
	{

		protected $tableName = 'user';


		/**
		 * [userRegister 验证用户是否被注册]
		 * @return [type] [$data]
		 */
		public function userRegister()
		{

			$name = I('get.name');

			// dump($name);

			$User = M('user');

			// dump($User);

			$data = $User->where("name='$name' ")->find();

			// echo $User->getLastSQL();
			
			return  $data;
		}

		/**
		 * [userRegisterTwo 用户注册]
		 * @return [type] [description]
		 */
		public function userRegisterTwo()
		{

			$name = I('post.name');

			$User = M('user');

			$data = $User->where("name='$name' ")->find();

			// var_dump($data);

			if($data == null){

					$username = I('post.name');

					$password = password_hash( I('post.pass'),PASSWORD_DEFAULT);

					$email = trim( I('post.email') );

					$regtime = time();

					//创建用于激活识别码
					
					$token = md5($username.$password.$regtime);	

					$token_exptime = time()+60*15;//过期时间为24小时后

					// dump($token_exptime);
					// dump($regtime);

					$User = M("User"); 

					$data['name'] = $username;


					$data['pass'] = $password;

					$data['email'] = $email;

					$data['time'] = $regtime;

					$result = $User->add($data);

					$id = $result;

					$tuser = M('user_s');

					$datas['zid'] = $id;

					$datas['token'] = $token;

					$datas['token_exptime'] = $token_exptime;

					$res = $tuser->add($datas);

					// dump($regtime);

					// dump($token_exptime);

					$arr = array(

						'email'=>$email,
						'res'=>$res,
						'name'=>$username,
						'id'=>$id,
						'exptime'=>$token_exptime,
						);
					return $arr;

			}

		}

		public function sendMail($email, $content)
        {

                $mail = new \PHPMailer;

                //$mail->SMTPDebug = 3;                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.aliyun.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'qq1061495484@aliyun.com';   

                $mail->CharSet ="UTF-8";

                // SMTP username
                $mail->Password = 'qq12301230';                           // SMTP password
                $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;                                    // TCP port to connect to

                $mail->setFrom('qq1061495484@aliyun.com', '美旅外卖');
                $mail->addAddress($email, 'Joe User');     // Add a recipient
                // $mail->addAddress('ellen@example.com');               // Name is optional
                $mail->addReplyTo('qq1061495484@aliyun.com', '美旅外卖');
                $mail->addCC('cc@example.com');
                $mail->addBCC('bcc@example.com');

                // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = '美旅外卖';
                $mail->Body    = $content;
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if(!$mail->send()) {
                    //输出错误信息
                    echo 'Mailer Error: '.$mail->ErrorInfo;
                    return 1;//邮件发送失败
                } else {
                        
                    return 2;//邮件发送成功
                }


        }


	}



?>