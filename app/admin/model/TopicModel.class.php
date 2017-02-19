<?php
namespace admin\model;
use framework\core\Model;
class TopicModel extends Model {
	protected $table_name = 'ask_topic';
	
	//验证数据的合法性
	public function checkData($data)
	{
		if($data['topic_title']===''){
			$this -> error[] = '话题标题不能为空';
		}else if($data['topic_desc']===''){
			$this -> error[] = '话题描述不能为空';
		}
		if(!empty($this -> error)){
			//错误不为空，有错误
			return false;
		}else{
			//错误为空，没有错误
			return true;
		}
	}
	//保存话题的信息
	public function insertTopic($data)
	{
		return $this -> insert($data);
	}
	//查询话题列表
	public function getTopics()
	{
		$sql = "SELECT * FROM $this->true_table";
		return $this -> dao -> getAll($sql);
	}
	//根据话题id查询该条信息
	public function getTopicById($topic_id)
	{
		return $this -> find($topic_id);
	}
	//更新话题
	public function updateTopic($data)
	{
		return $this -> update($data);	
	}
	//删除话题
	public function deleteTopic($topic_id)
	{
		return $this -> delete($topic_id);
	}
 
	//查询热门话题,哪个话题下面的问题越多哪个话题越热门
	public function getHotTopics()
	{
		$sql = "CREATE VIEW hot_topic_view AS SELECT t.*,count(tq.question_id) AS q_num FROM $this->true_table AS t LEFT JOIN ask_topic_question AS tq ON t.topic_id=tq.topic_id GROUP BY tq.topic_id ORDER BY q_num DESC LIMIT 3";
		$sql = "SELECT * FROM $this->true_table DESC LIMIT 3 ";
		//非查询语句使用dao对象里面的exec(),创建视图
		$this -> dao -> exec($sql);

//		if($result){
		   //将视图和用户关注数量连接查询
		   $sql = "SELECT h.*,count(u.user_id) as user_num FROM hot_topic_view AS h LEFT JOIN ask_user_topic as u ON h.topic_id=u.topic_id GROUP BY u.topic_id";
         //给控制器返回查询的热门话题信息
//         var_dump($this ->dao -> getAll($sql)) ;die;
         return $this ->dao -> getAll($sql);
//      }else{
//		   return 'error';
//      }
	}
	//析构方法
	public function __destruct()
	{
		$sql = "DROP VIEW IF EXISTS hot_topic_view";
//		$this -> dao -> exec($sql);
	}
}