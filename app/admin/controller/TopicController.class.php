<?php
namespace admin\controller;
use framework\core\Controller;
use framework\tools\Upload;
use framework\tools\Image;
use framework\core\Factory;

class TopicController extends Controller 
{
	//显示话题列表
	public function index()
	{
		//命令模型查询目前所有的话题列表
		$model = Factory::M('TopicModel');
		$topics = $model -> getTopics();
		
		//分配到模板
		$this -> smarty -> assign('topics',$topics);
		$this -> smarty -> display('topic/index.html');
	}
	//显示添加话题的表单
	public function add()
	{
		$this -> smarty -> display('topic/add.html');
	}
	//接收表单提交的数据，并保存到数据库
	public function addHanle()
	{
		//话题的标题
		$data['topic_title'] = $_POST['topic_title'];
		//话题的描述
		$data['topic_desc'] = $_POST['topic_desc'];
		//验证数据是否为空
		$model = Factory::M('TopicModel');
		//验证数据的合法性
		$result = $model -> checkData($data);
		//数据合法
		if($result){
			//上传话题图标，使用Upload类
			$upload = new Upload();
			$upload -> setUploadPath('./app/public/uploads/topic/');
			$path = $upload -> doUpload($_FILES['topic_thumb']);
			
			//对刚刚上传的图像进行压缩处理
			$image = new Image('./app/public/uploads/topic/'.$path);
			$image -> setThumbPath('./app/public/static/thumb/');
			$thumb_path = $image -> makeThumb(50,50);
			$data['topic_thumb'] = $thumb_path;
			$data['add_time'] = time();
			
			//保存到数据库
			$res = $model -> insertTopic($data);
			if($res){
				$this -> jumpNow('index.php?m=admin&c=topic&a=index');
			}else{
				$this->jumpWait('添加失败','index.php?m=admin&c=topic&a=add');
			}
		}else{
			//数据不合法
			$this->jumpWait('数据不合法,详细信息如下:<br>'.$model->getError(),'index.php?m=admin&c=topic&a=add');
		}
	}
	//显示编辑的表单
	public function edit()
	{
		//接收编辑的话题的id
		$topic_id = $_GET['id'];
		//命令模型查询该话题的信息
		$model = Factory::M('TopicModel');
		$topic = $model -> getTopicById($topic_id);
		
		//分配到编辑的表单页面
		$this -> smarty -> assign('topic',$topic);
		//显示模板
		$this -> smarty -> display('topic/edit.html');
	}
	//接收编辑表单提交的数据，执行更新操作
	public function update()
	{
		$data['topic_id'] = $_POST['topic_id'];
		$data['topic_title'] = $_POST['topic_title'];
		$data['topic_desc'] = $_POST['topic_description'];
		//由于用户可能上传新的话题的图标，也可能没上传，所以判断一下
		if($_FILES['topic_thumb']['error']===0){
			//用户上传了新的 图标，使用新的代替旧的
			//上传话题图标，使用Upload类
			$upload = new Upload();
			$upload -> setUploadPath('./app/public/uploads/topic/');
			$path = $upload -> doUpload($_FILES['topic_thumb']);			
			//对刚刚上传的图像进行压缩处理
			$image = new Image('./app/public/uploads/topic/'.$path);
			$image -> setThumbPath('./app/public/static/thumb/');
			$thumb_path = $image -> makeThumb(50,50);
			//删除旧的原图、缩略图20160901/57c7e6aa8d41d3.41823287.png
			$origin = str_replace('thumb_','',$_POST['old_topic_thumb']);
			@unlink('./app/public/uploads/topic/'.$origin);
			@unlink('./app/public/static/thumb/'.$_POST['old_topic_thumb']);
			$data['topic_thumb'] = $thumb_path;
		}else{
			//用户没有上传新的图标，则使用旧的
			$data['topic_thumb'] = $_POST['old_topic_thumb'];
		}
		//更新到数据库
		$model = Factory::M('TopicModel');
		$result = $model -> updateTopic($data);	
		//更新的时候可能会遇到sql语句没错误，但是受影响的记录数为0
		if($result!==false){
			$this -> jumpNow('index.php?m=admin&c=topic&a=index');	
		}else{
			$this -> jumpWait('更新失败,自己反思去吧','index.php?m=admin&c=topic&a=edit&id='.$data['topic_id']);
		}
	}
	//删除话题操作
	public function delete()
	{
		//接收话题的id
		$topic_id = $_GET['id'];
		//查询话题信息
		$model = Factory::M('TopicModel');
		$topic = $model -> getTopicById($topic_id);
		//先删除话题的原图、缩略图
		$origin = str_replace('thumb_','',$topic['topic_thumb']);
		@unlink('./app/public/uploads/topic/'.$origin);
		@unlink('./app/public/static/thumb/'.$topic['topic_thumb']);
		
		//删除数据库
		$result = $model -> deleteTopic($topic_id);
		if($result!==false){
			$this -> jumpNow('index.php?m=admin&c=topic&a=index');	
		}else{
			$this -> jumpWait('删除失败,自己反思去吧','index.php?m=admin&c=topic&a=index');
		}
	}

}