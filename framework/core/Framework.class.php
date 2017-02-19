<?php
namespace framework\core;
class Framework {
  public function __construct() {
    $this->initPath();
    $this->initAutoload();

    //合并框架与通用的配置
    $config1 = $this->loadFrameworkConfig();
    $config2 = $this->loadCommonConfig();
    $GLOBALS['config'] = array_merge($config1 , $config2);

    //根据伪静态的地址进行解析
    $this->initPathinfo();

    $this->initModule();

    $config3 = $this->loadModuleConfig();
    $GLOBALS['config'] = array_merge($GLOBALS['config'] , $config3);

    $this->initCA();
    $this->initDispatch();
  }

  //根据伪静态的地址解析模块、控制器、方法分别是谁
  private function initPathinfo() {
    //先获得index.php后面的参数
    if (!isset($_SERVER['PATH_INFO'])) {
      //说明没有参数
      //指定默认的模块、控制器、方法
      return;
    }
    //http://localhost/0909/path.php/home/index.html
    //分割之前，有2件事情需要完成：
    //.html对我们是没有任何用的，就是给百度看的
    $path = strrchr($_SERVER['PATH_INFO'] , '.');

    $path = str_replace($path , '' , $_SERVER['PATH_INFO']);
    //var_dump($path);	//	/home/index/index

    $path = substr($path , 1);

    //炸开，生成数组
    $arr = explode('/' , $path);

    $length = count($arr);
    if ($length == 1) {
      //这个参数就应该是模块名字
      $_GET['m'] = $arr[0];
    } elseif ($length == 2) {
      //分别表示的是模块、控制器
      $_GET['m'] = $arr[0];
      $_GET['c'] = $arr[1];
    } elseif ($length == 3) {
      $_GET['m'] = $arr[0];
      $_GET['c'] = $arr[1];
      $_GET['a'] = $arr[2];
    } else {
      //http://localhost/0909/path.php/home/index/index/page/5.html
      $_GET['m'] = $arr[0];
      $_GET['c'] = $arr[1];
      $_GET['a'] = $arr[2];
      //从第四个元素开始，就应该是额外的参数了

      for ( $i = 3 ; $i < $length ; $i += 2 ) {
        //参数的下标
        //		$arr[$i];			//参数的名称
        //		$arr[$i+1];			//参数的值
        $_GET[$arr[$i]] = $arr[$i + 1];
      }
    }
  }

  //加载框架的配置
  private function loadFrameworkConfig() {
    return require FRAMEWORK_PATH . 'config/config.php';
  }

  //加载通用的配置
  private function loadCommonConfig() {
    //公共的配置文件可能没有写
    $config_file = APP_PATH . 'common/config/config.php';
    if (file_exists($config_file)) {
      return require $config_file;
    } else {
      return array();
    }
  }

  //加载独立的配置
  private function loadModuleConfig() {
    //独立的配置文件可能没有写
    $config_file = APP_PATH . MODULE . '/config/config.php';
    if (file_exists($config_file)) {
      return require $config_file;
    } else {
      return array();
    }
  }

  //初始化路径常量
  private function initPath() {
    //项目的根目录
    define('ROOT_PATH' , str_replace('\\' , '/' , getcwd() . '/'));
    //应用程序的目录
    define('APP_PATH' , ROOT_PATH . 'app/');
    //框架的目录
    define('FRAMEWORK_PATH' , ROOT_PATH . 'framework/');
    //静态资源的路径
    define('PUBLIC_ADMIN' , '/app/public/admin/');
    define('PUBLIC_HOME' , '/app/public/home/');
    //上传文件路径常量(相对于磁盘的绝对位置)
    define('UPLOAD_PATH' , APP_PATH . 'public/uploads/');
    //压缩后文件路径常量(文件的绝对位置)
    define('THUMB_PATH' , '/app/public/uploads/');
    //静态html文件的根目录
    define('STATIC_PATH' , '/app/public/static/html/');
  }

  /*
   * 自动加载函数
   * @param	$className 参数就是我们需要的类的名字、或者接口的名字
   */
  function userAutoload($className) {
    //echo $className.'<br>';
    if ($className == 'Smarty') {
      require './framework/vendor/smarty/Smarty.class.php';
    }
    //根据命名空间的第一个前缀，确定加载的根目录，framework开头的都去framework这个目录下面
    $arr = explode("\\" , $className);
    //获得第一个元素
    if ($arr[0] == 'framework') {
      //确定查询的根目录就是framework
      $base_path = './';
    } else {
      //确定查询的根目录就是app
      $base_path = APP_PATH;
    }
    //将home\model\GoodsModel  替换成  home/model/GoodsModel
    $sub_path = str_replace("\\" , '/' , $className);

    //判断是类文件还是接口文件
    $last_fix = basename($className);  //获得文件的后缀
    if (substr($last_fix , 0 , 2) == 'I_') {
      $fix = '.interface.php';
    } else {
      $fix = '.class.php';
    }
    $class_file = $base_path . $sub_path . $fix;

    if (file_exists($class_file)) {
      require $class_file;
    }
  }

  //将自动加载函数注册进来
  private function initAutoload() {
    spl_autoload_register(array($this , "userAutoload"));
  }

  //初始化模块（前台操作还是后台操作）
  private function initModule() {
    $m = isset($_GET['m']) ? $_GET['m'] : $GLOBALS['config']['default_module'];  //前台、后台
    define('MODULE' , $m);
  }

  //初始化控制器、方法
  private function initCA() {
    $c = ucfirst(isset($_GET['c']) ? $_GET['c'] : $GLOBALS['config']['default_controller']);  //控制器
    define('CONTROLLER' , $c);

    $a = isset($_GET['a']) ? $_GET['a'] : $GLOBALS['config']['default_action'];  //控制器的那个方法、动作
    define('ACTION' , $a);
  }

  //调用控制器的方法
  private function initDispatch() {
    $controller_name = MODULE . "\\controller\\" . CONTROLLER . 'Controller';
    $controller = new $controller_name;
    $a = ACTION;
    $controller->$a();
  }
}