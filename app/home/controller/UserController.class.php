<?php
namespace home\controller;

use framework\core\Controller;
use framework\core\Factory;
use framework\tools\Image;
use framework\tools\Upload;
use framework\tools\Verify;
use framework\tools\Captcha;
use framework\tools\Email;
use framework\tools\Message;

class UserController extends Controller
{
   //显示注册页面
   public function register()
   {
      $this->smarty->display('user/register.html');
   }

   //显示短信验证的注册页面
   public function msm()
   {
      $this->smarty->display('user/msm_register.html');
   }

   //显示登录页面
   public function login()
   {
      $this->smarty->display('user/login.html');
   }

   //退出登录
   public function logout()
   {
      //删除session数据
      unset($_SESSION['user']);
      //删除cookie数据
      setcookie('uname', '', time() - 1, '/');
      setcookie('pass', '', time() - 1, '/');
      $this->jumpWait('', Factory::U('home/user/login'), 0);
   }

   public function edit()
   {
      $this->isLogin();

      $user_info = $_SESSION['user'];

      $user_model = Factory::M('User');
      $user = $user_model->getById($user_info['user_id']);
      $user_info['is_active'] = $user['is_active'];
      $this->smarty->assign('user', $user_info);
      $this->smarty->display('user/edit.html');
   }

   //接收表单提交的数据，并验证
   public function addHandle()
   {
      //1. 先判断用户是否同意协议
      //var_dump($_POST);
      if (isset($_POST['agreement_chk']) && $_POST['agreement_chk'] == 'agree') {
         //说明用户同意协议
         //2. 验证验证码是否正确
         //拿生成的验证码(session['captcha_code']) 和用户填写的进行比较
         if ($_SESSION['captcha_code'] == $_POST['seccode_verify']) {
            $data['username'] = $_POST['user_name'];
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];

            //怎么验证
            $verify = new Verify();
            //调用checkUser()验证用户名
            $res1 = $verify->checkUser($data['username'], 5, 29);
            //调用checkEmail()验证邮箱
            $res2 = $verify->checkEmail($data['email']);
            //调用checkPass()验证密码
            $res3 = $verify->checkPass($data['password'], 6, 20);

            //保证用户名、密码、邮箱都正确才能注册，否则显示错误信息
            if ($res1 && $res2 && $res3) {
               //保存到数据库
               echo '都正确';
               $data['password'] = md5($_POST['password']);
               $data['active_code'] = md5(mt_rand(10000, 99999) . time());
               $data['active_code_time'] = time();  //发送邮件的时间，判断是否过期
               $data['is_active'] = 0;
               //将用户名、邮箱、密码保存到数据库
               $m_user = Factory::M('UserModel');

               //exec()返回受影响的记录数
               $user_id = $m_user->insert($data);

               //发送激活邮件
               $this->sendMail($user_id, $data['active_code'], $data['email']);
            } else {
               //显示错误信息并返回
               $this->jumpWait('注册失败，错误信息如下:<br>' . $verify->getError(),
                     Factory::U('home/user/register'));
            }
         } else {
            $this->jumpWait('验证码错误', Factory::U('home/user/register'));
         }

         //3. 验证用户名、邮箱、密码是否符合规则
         //4. 注册、将数据保存到数据库
         //5. 改用户发送邮件，让用户激活
      } else {
         $this->jumpWait('你必须先同意协议才能注册', Factory::U('home/user/register'));
      }
   }

   //生成验证码
   public function showCaptcha()
   {
      //实例化验证码对象
      $captcha = new Captcha();
      $captcha->showCaptcha();

   }

   //邮箱激活操作
   public function activate()
   {
      //接收超链接身上传递的用户id以及生产的唯一口令
      $user_id = $_GET['uid'];
      $acive_code = $_GET['code'];
      //获得用户模型
      $m_user = Factory::M('UserModel');
      //基础模型中，封装过find()方法根据主键查询用户信息
      //但是当时封装的是protected，如果想在这里使用将其改为public
      $user = $m_user->find($user_id);
      if ($user) {
         //激活链接是有效的
         //判断激活时间是否过期
         if (time() - $user['active_code_time'] > 24 * 3600) {

            //重新发送激活邮件，还需要先生成新的口令并更新数据库
            $data['user_id'] = $user_id;
            $data['active_code'] = md5(mt_rand(10000, 99999) . time());
            $data['active_code_time'] = time();
            //将基础模型中的proteced修改为public
            $m_user->update($data);
            $this->sendMail($user_id, $data['active_code'], $user['email']);

            $this->jumpWait('激活链接已过期,重新发送激活邮件，请重新查收并激活',
                  Factory::U('home/user/register'));
         } else {
            //激活成功，更新数据表，将is_active修改为1
            $data['user_id'] = $user_id;
            $data['is_active'] = 1;
            $m_user->update($data);

            //直接登录
            $this->jumpNow('index.php?m=home&c=user&a=login');
         }
      } else {
         //没有找到，说明激活链接无效的
         $this->jumpWait('激活链接无效', Factory::U('home/user/register'));
      }
   }

   //发送激活邮件
   public function sendMail($uid, $code, $email)
   {
      $title = '注册成功,请激活';
      $content = <<<BODY
<h1>恭喜您，注册成功，请点击下面的激活按钮进行激活</h1>
<a href="http://localhost/20160906/index.php?m=home&c=user&a=activate&uid=$uid
&code=$code">点击激活</a>
BODY;
      Email::sendMail($title, $content, $email);
   }

   //用户登录时判断是否激活
   public function doLogin()
   {
      //根据用户名、密码去数据库查询
      $m_user = Factory::M('UserModel');
      //"SELECT * FROM ask_user WHERE username='zhanfan' and password='zhandfsan'";
      $user = $m_user->getByName($_POST['user_name']);

      if (!$user) {
         $this->jumpWait('用户信息不正确', Factory::U('home/user/login'));
      }
      if ($user['password'] != md5($_POST['password'])) {
         $this->jumpWait('用户信息不正确', Factory::U('home/user/login'));
      }
      if ($user['is_active'] == 0) {
         $this->jumpWait('请先激活再登录', Factory::U('home/user/login'));
      }

      //判断是否选中了保存这次登录状态
      if (isset($_POST['net_auto_login']) && $_POST['net_auto_login'] == 1) {
         //保存这次登录的用户名、密码，将来还要判断这个密码是否变化了
         setcookie('uname', $_POST['user_name'], time() + 7 * 24 * 3600, '/');
         setcookie('pass', md5($_POST['password']), time() + 7 * 24 * 3600, '/');
      }
      //走到这一步说明都正确,说明登录成功,跳转到首页
      //将用户信息保存到session中
      $_SESSION['user'] = $user;
      $this->jumpNow(Factory::U('home/index/index'));
   }

   //发送短信验证码
   public function sendMessage()
   {
      if (isset($_POST['agreement_chk']) && $_POST['agreement_chk'] == 'agree') {
         //验证码是否正确
         if ($_SESSION['captcha_code'] == $_POST['seccode_verify']) {
            //发送短信
            $message = new Message();
            $code = mt_rand(1000, 9999);
            $message->sendTemplateSMS($_POST['msm'], array($code, '5'));

            //发送成功之后，将验证码信息保存到数据库，便于后面验证
            $m_message = Factory::M('MessageModel');
            $data['msm_code'] = $code;
            $data['send_time'] = time();
            $data['phone'] = $_POST['msm'];
            $result = $m_message->insert($data);
            if ($result) {
               $this->jumpNow(Factory::U('home/user/msmRegister'));
            } else {
               echo '发送失败';
            }
         } else {
            $this->jumpWait('验证码错误', Factory::U('home/user/msm'));
         }
      } else {
         $this->jumpWait('你必须同意协议才能注册', Factory::U('home/user/msm'));
      }
   }

   public function msmRegister()
   {
      $this->smarty->display('user/msm_register.html');
   }

   public function msmCheck()
   {
      //注册用户之前验证手机、短信验证码是否正确，如果一致才能注册
      //接收手机号码
      $phone = $_POST['msm'];
      //验证码
      $msm_code = $_POST['msm_code'];
      //去短信表查询一下
      $m_message = Factory::M('MessageModel');
      $result = $m_message->getMSM($phone, $msm_code);
//      var_dump($result);
      //判断验证码是否过期
      if (!$result) {
         $this->jumpWait('验证码错误', Factory::U('home/user/msm'));
      }
      //判断是否过期
      if (time() - $result['send_time'] > 50 * 60) {
         $this->jumpWait('验证码已过期', Factory::U('home/user/msm'));
      }
      //正确,可以注册,保存用户的信息
      $data['username'] = $_POST['user_name'];
      $data['password'] = $_POST['password'];
      $data['phone'] = $phone;

      $m_user = Factory::M('UserModel');
      $res = $m_user->insert($data);
      if ($res) {
         $this->jumpNow(Factory::U('home/user/login'));
      } else {
         $this->jumpWait('注册失败', Factory::U('home/user/msm'));
      }
   }

   //添加头像处理
   public function addThumb()
   {
      //$user_thumb = $_FILES['user_thumb'];

      if ($_FILES['user_thumb']['error'] == 0) {

         $upload = new Upload();
         $upload->setPrefix('ask_');
         $upload_path = UPLOAD_PATH . 'user/';

         $upload->setUploadPath($upload_path);
         $user_img = $upload->doupload($_FILES['user_thumb']);

         $thumb_path = $upload_path . $user_img;

         $thumb = new Image($thumb_path);
         $thumb->setThumbPath($upload_path);
         $user_thumb_img = $thumb->makeThumb(50, 50);
         $u['user_thumb'] = 'user/' . $user_thumb_img;

         $user_model = Factory::M('User');
         $user = $user_model->getByName($_SESSION['user']['username']);
         $u['user_id'] = $user['user_id'];
         $result = $user_model->update($u);

         if ($result) {
            $_SESSION['user']['user_thumb'] = $u['user_thumb'];
//        echo '<pre>';
//        var_dump($$_SESSION['user']);
//        die;
            $this->jumpWait('', Factory::U('home/user/edit'), 1);
         }

      } else {
         die('上传出错');
      }

   }

   //接收表单提交的数据，并验证
   public function editHandle()
   {


   }


   //使用ajax验证用户名
   public function checkUser()
   {
      //接收post表单提交的用户填写的用户名
      $user_value = $_POST['username'];
      //调用UserModel查询该用户名是否已经存在
      $user_model = Factory::M('User');
      $res = $user_model->getByName($user_value);
      echo $res;
   }
}

