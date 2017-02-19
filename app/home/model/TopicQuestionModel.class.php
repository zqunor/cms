<?php
namespace home\model;
use framework\core\Model;

class TopicQuestionModel extends Model
{
	protected $table_name = 'ask_topic_question';
	public function insertTopicQuestion($data)
	{
		return $this -> insert($data);
	}
}