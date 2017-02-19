<?php
namespace home\controller;

use framework\core\Controller;
use framework\core\Factory;
use framework\tools\Page;

class IndexController extends Controller {
  public function index() {

    //命令模型查询首页的所有数据
    $model = Factory::M('admin\\model\\CategoryModel');
    $result = $model->getCategory();

    //查询问题列表字段（用户头像、问题标题、分类名称、用户名称、关注数量、回复数量、浏览量、发布时间）
    $m_question = Factory::M('QuestionModel');

    $page = new Page();

    $page->_page_now = isset($_GET['page']) ? $_GET['page'] : 1;
    $page->_page_size = 2;
    $page->_total = $m_question->getAllRows();
    $page->_url = Factory::U('home/Index/index');

    $page_size = $page->_page_size;
    $page_now = $page->_page_now;

    $page_start = ($page_now - 1) * $page_size;
    //获得每页的问题列表
    $questions = $m_question->getQuestions($page_start , $page_size);

    //生成分页导航
    $page_html = $page->ajaxPage();

    //分配到模板中
    $this->smarty->assign('page_html' , $page_html);

    $this->smarty->assign('questions' , $questions);


    //命令后台的话题模型查询热门话题
    $m_topic = Factory::M('admin\\model\\TopicModel');
    $hot_topics = $m_topic->getHotTopics();

    //查询热门用户
    $m_user = Factory::M('UserModel');
    $hot_user = $m_user->getHotUser();

    $this->smarty->assign('hot_user' , $hot_user);

    $this->smarty->assign('hot_topics' , $hot_topics);

    $this->smarty->assign('cat_list' , $result);
    $this->smarty->display('index.html');
  }

  public function suggest() {
    $this->smarty->display('suggest.html');
  }

  //ajax实现搜索功能
  public function getSuggest() {
    $name = $_POST['name'];

    $goods_model = Factory::M('Goods');
    $res = $goods_model->getByName($name);

    if ($res) {
      $data = array(
        'status' => 1 ,
        'msg'    => $res
      );
    } else {
      $data = array(
        'status' => 0 ,
        'msg'    => '没有相关信息'
      );
    }
    echo json_encode($data);
  }

  //ajax实现分页显示问题列表
  public function getQuestions() {

    $m_question = Factory::M('QuestionModel');

    $page = new Page();

    $page->_page_now = isset($_POST['page']) ? $_POST['page'] : 1;
    $page->_page_size = 2;
    $page->_total = $m_question->getAllRows();
    $page->_url = Factory::U('home/Index/index');

    $page_size = $page->_page_size;
    $page_now = $page->_page_now;

    $page_start = ($page_now - 1) * $page_size;
    //获得每页的问题列表
    $questions = $m_question->getQuestions($page_start , $page_size);

    //生成分页导航
    $page_html = $page->ajaxPage();

    //分配到模板中
    $data['page_html'] = $page_html;
    $data['list'] = $questions;
    echo json_encode($data);
  }


}