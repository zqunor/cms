<?php
namespace framework\tools;
/**
 * 验证码工具类
 * CAPTCHA项目是Completely Automated Public Turing Test to Tell Computers and Humans Apart (全自动区分计算机和人类的图灵测试)的简称
 */
class Captcha {
  /**
   * @var $_width 绘制画布的宽度
   * @var $_height 绘制画布的高度
   * @var $_code_len 验证码的位数
   * @var $_fontfiles 验证码显示字体的数字
   * @var $_pixel_num 产生的干扰点的数量
   * @var $_line_num 产生的干扰线条的数量
   */
  private $_width = 100;
  private $_height = 30;
  private $_code_len = 4;
  private $_fontfiles = array('simkai.ttf' , 'simhei.ttf');
  private $_sess_name = 'code';
  private $_pixel_num = 50;
  private $_line_num = 3;

  /**
   * @param $p 外部要进行设置的属性名
   * @param $v 外部要进行设置的属性值
   */
  public function __set($p , $v) {
    if (property_exists($this , $p)) {
      $this->$p = $v;
    }
  }

  /**
   * @param $p 外部访问的属性名
   * @return 返回外部不可访问属性的属性值
   */
  public function __get($p) {
    if (isset($this->$p)) {
      return $this->$p;
    }
  }

  public function showCaptcha() {
    // 1.创建画布
    $image = imagecreatetruecolor($this->_width , $this->_height) or die("画布创建失败!");

    // 2.创建画笔颜色
    $white = imagecolorallocate($image , 255 , 255 , 255) or die("画笔颜色创建失败!");

    // 3.填充为白色画布
    imagefill($image , 0 , 0 , $white);

    // 4.生成验证码字符串
    $str = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890';
    // 验证码长度
    $str = str_shuffle($str);
    $codes = '';
    // 循环生成相应长度的验证码字符串
    for ( $i = 0 ; $i < $this->_code_len ; $i++ ) {
      // 获得字符串中随机字母对应的下标

      $code_index = mt_rand(0 , strlen($str) - 1);

      // 拼接相应下标对应的字母
      $code = $str[$code_index];
      $codes .= $str[$code_index];

      // 5.输出到画布上
      //imagettftext()函数的参数设置
      $size = mt_rand(14 , 24);        //字体大小
      $angle = mt_rand(-15 , 15);      //字体的倾斜角度
      $x = $i * 20 + 20;        //字体的横坐标
      $y = mt_rand(15 , $this->_height);   //字体的纵坐标

      //字体颜色
      $color = imagecolorallocate($image , mt_rand(0 , 200) , mt_rand(0 , 150) , mt_rand(0 , 180));
      //字体
      $fontfile = $this->_fontfiles[mt_rand(0 , count($this->_fontfiles) - 1)];
      //字体路径
//      die("./app/public/home/fonts/{$fontfile}");
      $fontfile ="./app/public/home/fonts/{$fontfile}";

      //将产生的一位字符串输出到画布上
      imagettftext($image , $size , $angle , $x , $y , $color , $fontfile , $code);

    }

    // 生成干扰点
    for ( $i = 0 ; $i < $this->_pixel_num ; $i++ ) {
      $color = imagecolorallocate($image , mt_rand(0 , 200) , mt_rand(0 , 200) , mt_rand(0 , 200));
      imagesetpixel($image , mt_rand(10 , $this->_width) , mt_rand(0 , $this->_height) , $color);
    }

    // 生成干扰线
    for ( $i = 0 ; $i < $this->_line_num ; $i++ ) {
      $color = imagecolorallocate($image , mt_rand(50 , 200) , mt_rand(100 , 200) , mt_rand(80 , 200));
      imageline($image , mt_rand(0 , 20) , mt_rand(0 , $this->_height) , mt_rand($this->_width - 20 , $this->_width) , mt_rand(0 , $this->_height) , $color);
    }
    // 开启session, 将生成的验证码存放到服务器端的文件中
    session_start();
    $_SESSION[$this->_sess_name] = $this->_codes;

    // 6.输出画布到网页,使用png格式,同样可以使用jpg和gif,png显示效果最好
    //清除缓存
    ob_clean();
    header('content-type: image/png');
    imagepng($image);

    // 7.销毁图像资源
    imagedestroy($image);
  }

  /* *
   * 验证用户输入的验证码和系统生成的验证码是否相等
   * @param $user_code 用户输入的验证码
   */
  public function checkCode($user_code) {

    @session_start();
    $result = isset($user_code)
      && isset($_SESSION[$this->_sess_name])
      && (strtolower($_SESSION[$this->_sess_name]) == strtolower($user_code));

    // 无论是否相等, 都要销毁session中的验证码, 然后重新生成
    if (isset($_SESSION[$this->_sess_name])) {
      unset($_SESSION[$this->_sess_name]);
    }

    return $result;
  }

}
