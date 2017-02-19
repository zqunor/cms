<?php
/**
 * Created by ZhouQ.
 * Time: 2016/9/11 15:25
 */

namespace admin\controller;

use framework\core\Controller;
use framework\core\Factory;

class QuestionController extends Controller
{
    public function index()
    {
        $question_model = Factory::M('Question');
        $question_list = $question_model->find();

        //获取问题作者信息
        $user_model = Factory::M('User');
        $user = $user_model ->getOneById($question_list['user_id']);

        $this->smarty->assign('question_list', $question_list);
        $this->smarty->assign('author', $user);
        $this->smarty->display('question/index.html');
    }
}