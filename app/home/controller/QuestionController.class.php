<?php
namespace home\controller;

use framework\core\Controller;
use framework\core\Factory;
use framework\tools\HttpRequest;

class QuestionController extends Controller
{
   //显示发布问题的表单页面
   public function add()
   {
      $this->isLogin();

      //命令模型查询分类信息(我们需要的是后台的模型类)
      $m_category = Factory::M('admin\\model\\CategoryModel');
      $cat_list = $m_category->getCategory();

      //命令模型查询话题列表
      $m_topic = Factory::M('admin\\model\\TopicModel');
      $topics = $m_topic->getTopics();

      $this->smarty->assign('topic_list', $topics);
      $this->smarty->assign('cat_list', $cat_list);
      $this->smarty->display('question/add.html');
   }

   //接收表单提交的数据并保存到数据表
   public function addHandle()
   {
      //先保存问题信息
      $data['question_title'] = $_POST['question_title'];
      $data['question_desc'] = $_POST['question_desc'];
      $data['cat_id'] = $_POST['cat_id'];
      $data['pub_time'] = time();
      $data['user_id'] = $_SESSION['user']['user_id'];

      $m_question = Factory::M('QuestionModel');
      $question_id = $m_question->insertQuestion($data);

      if ($question_id) {
         //维护问题和话题之间的关系
         foreach ($_POST['topic_id'] as $row) {
            $d['topic_id'] = $row;
            $d['question_id'] = $question_id;
            //获得问题话题模型对象
            $m_tq = Factory::M('TopicQuestionModel');
            $result = $m_tq->insertTopicQuestion($d);
            if (!$result) {
               $this->jumpWait('添加问题话题表记录添加失败,请重试', Factory::U('home/question/add'));
            }
         }
         //发布问题成功之后，就应该将刚刚接收的表单数据保存到静态文件中,便于后面的用户查询使用
         //ob_start();	因为在smarty的fetch方法中开启了ob缓冲，所有这里可以注释掉
         $m_question = Factory::M('QuestionModel');

         $result = $m_question->getDetail($question_id);
         $this->smarty->assign('cat', $result['cat']);
         $this->smarty->assign('answer', $result['answer']);
         $this->smarty->assign('answer_count', count($result['answer']));

         //仅仅拿到模板内容并替换变量，将内容返回
         $result = $this->smarty->fetch('question/detail.html');
         $static_url = ROOT_PATH . 'app/public/static/html/question/';
         $sub_path = date('Ymd') . '/';
         //如果该目录不存在，则创建
         if (!is_dir($static_url . $sub_path)) {
            mkdir($static_url . $sub_path, 0777, true);
         }
         $file_name = 'detail_' . $question_id . '.html';
         /*      var_dump($static_url.$sub_path);
               die;*/

         //获得缓冲中的内容，将其保存到html文件中
         $res = file_put_contents($static_url . $sub_path . $file_name, $result);


         //将静态的url地址更新到ask_question表中
         if ($res) {
            //将静态的url地址保存到数据库
            $dd['question_id'] = $question_id;
            $dd['static_url'] = 'question/' . $sub_path . $file_name;
            //          echo '<pre>';
            //var_dump($dd);die;
            $m_question->update($dd);
         }
      } else {
         $this->jumpWait('添加失败,请重试', Factory::U('home/question/add'));
      }
      $this->jumpNow(Factory::U('home/index/index'));

   }

   //采集问题列表以及问题的回复
   public function collect()
   {
      //1. 先采集到知乎的所有内容
      $result = HttpRequest::send('http://localhost/20160907-curl/zhihu.html');
      //2. 使用正则表达式过滤符合我们需要的数据
      $reg = '/<a[^>]*class="js-title-link">(.+?)<\/a>.*?<script[^>]*class="content">(.*?)<\/script>/s';
      preg_match_all($reg, $result, $match);
      //var_dump($match);
      //问题列表
      $question_list = $match[1];
      //回复列表
      $answer_list = $match[2];
      //分别将问题列表保存到question表，将回复的内容保存到answer表
      $m_question = Factory::M('QuestionModel');
      $m_answer = Factory::M('AnswerModel');
      //先保存问题列表
      foreach ($question_list as $k => $v) {
         $data['question_title'] = $v;  //问题的标题
         $data['cat_id'] = 1;  //所属分类
         $data['pub_time'] = time();
         $data['user_id'] = $_SESSION['user']['user_id'];
         $question_id = $m_question->insert($data);

         if ($question_id) {
            //将答案保存到对应的answer表中
            $d['question_id'] = $question_id;
            $d['answer_content'] = $answer_list[$k];
            $d['answer_time'] = time();
            $d['user_id'] = $_SESSION['user']['user_id'];
            $m_answer->insert($d);
         }
      }
   }

   //显示问题详情
   public function detail()
   {
      //根据id查询问题的详情
      $question_id = $_GET['id'];
      //cat_name	question_title	pub_time 回复数量   user_thumb	username answer_content
      //提问问题的用户name
      $m_question = Factory::M('QuestionModel');
      $result = $m_question->getDetail($question_id);
      //		var_dump($result);
      //		die;
      $this->smarty->assign('cat', $result['cat']);
      $this->smarty->assign('answer', $result['answer']);
      $this->smarty->assign('answer_count', count($result['answer']));
      //分配到模板中显示
      //$this -> smarty -> assign();
      $this->smarty->display('question/detail.html');
   }
}