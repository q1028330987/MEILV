<?php
	namespace Home\Controller;
	use Think\Controller;
	class TestController extends Controller
	{
		public function sendMail($email = '1061495484@qq.com', $content = '123456')
        {
        		include_once './Application/Home/Util/PHPMailer.class.php';
        		include_once './Application/Home/Util/class.smtp.php';
                $mail = new \PHPMailer;
                //$mail->SMTPDebug = 3; // Enable verbose debug output
                // dump($mail);die;
                $mail->isSMTP(); // Set mailer to use SMTP
                $mail->Host = 'smtp.qq.com'; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = '617014283@qq.com'; // SMTP username
                $mail->Password = 'cpvwcyepammwbecb'; // SMTP password
                $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465; // TCP port to connect to
                $mail->setFrom('617014283@qq.com', '蘑菇街');
                $mail->addAddress($email, '小斌'); // Add a recipient
                // Name is optional
                $mail->addReplyTo('617014283@qq.com', '蘑菇街');

                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = '邮箱验证';

                // 将电话存在session中并

                $_SESSION[md5($email)] =md5($email);

                $_SESSION['verify_time'] = time().md5($email);

                $mail->Body = $content;
                $mail->AltBody = 'o';
                if(!$mail->send()) {
                    //输出错误信息
                    echo 'Mailer Error: '.$mail->ErrorInfo;
                    return 1;//邮件发送失败
                } else {
                        
                    return 2;//邮件发送成功
                }
	} 
}
