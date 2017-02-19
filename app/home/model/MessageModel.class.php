<?php
namespace home\model;
use framework\core\Model;

class MessageModel extends Model 
{
	protected $table_name = 'ask_message';
	//根据手机、短信验证码查询
	public function getMSM($phone,$msm_code)
	{
		$sql = "SELECT * FROM $this->true_table WHERE phone=$phone AND msm_code='$msm_code'";
		return $this -> dao -> getRow($sql);
	}
}