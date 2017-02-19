<?php
/**
 * IndexController.class.php
 * @author: zq <zhouqun195@163.com>
 * @createAt: 2017/1/5 22:08
 */

namespace admin\controller;

use framework\core\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $software = $_SERVER['SERVER_SOFTWARE'];
        $server['apache'] = explode('/',explode(' ',$software)[0])[1];
        $server['php'] = PHP_VERSION;
        $server['system'] =  php_uname("s") ;
        $link = mysqli_connect('127.0.0.1', 'root','','ask');
        $server['mysql'] =  mysqli_get_server_info($link);
        $this->smarty->assign('server', $server);
        $this->smarty->display('index.html');
    }
}