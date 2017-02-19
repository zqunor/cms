<?php
namespace home\model;
use framework\core\Model;

class QuestionModel extends Model
{
	protected $table_name = 'ask_question';

	//插入问题
	public function insertQuestion($data)
	{
		return $this -> insert($data);
	}

	public function getAllRows(){
		$sql = "SELECT count(*) AS num FROM $this->true_table";
		return $this->dao->getOne($sql);
	}
	//关联查询问题相关的信息
	public function getQuestions($start,$size)
	{
		$sql = "SELECT q.*,c.cat_name,u.username,u.user_thumb FROM $this->true_table AS q LEFT JOIN ask_category AS c ON q.cat_id=c.cat_id LEFT JOIN ask_user AS u ON q.user_id=u.user_id ORDER BY q.question_id DESC LIMIT $start,$size ";
		return $this -> dao -> getAll($sql);
	}
	//根据问题id查询   问题详情
	public function getDetail($q_id)
	{
		$sql = "SELECT c.cat_name,q.question_id,q.question_title,q.question_desc,q.pub_time,u.username,u.user_thumb FROM ask_question AS q LEFT JOIN ask_category AS c ON q.cat_id=c.cat_id LEFT JOIN ask_user AS u ON Q.user_id=u.user_id WHERE question_id=$q_id";
		$cat = $this -> dao -> getRow($sql);
		
		
		$sql = "SELECT a.answer_content,a.answer_time,u.username FROM ask_question AS q LEFT JOIN ask_answer AS a ON q.question_id = a.question_id  LEFT JOIN ask_user AS u ON q.user_id=u.user_id WHERE q.question_id=$q_id";
		$answer = $this -> dao -> getAll($sql);
		
		return array(
			'cat'	=>	$cat,
			'answer'=>	$answer
		);
	}
}