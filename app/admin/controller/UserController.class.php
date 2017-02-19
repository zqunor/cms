<?php
/**
 * UserController.class.php
 * @author: zq <zhouqun195@163.com>
 * @createAt: 2017/1/7 17:18
 */

namespace admin\controller;

use framework\core\Controller;
use framework\core\Factory;

class UserController extends Controller
{
    public function index()
    {
        $user_model = Factory::M('UserModel');
        $user_list = $user_model->getUsers();
        $this -> smarty ->assign('user_list', $user_list);
        $this -> smarty ->display('user/index.html');
    }

    public function add()
    {
        $this->smarty->display('user/add.html');
    }
}