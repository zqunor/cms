<?php
	function smarty_insert_getPrice($params)
	{
		//var_dump($params);
		$goods_id = $params['id'];
		$option = array(
			'host'	=>	'127.0.0.1',
			'dbname'=>	'phone',
			'user'	=>	'root',
			'pass'	=>	'',
			'port'	=>	3306,
			'charset'=>	'utf8'
		);	
		//实例化PDO对象
		$dao = DAOPDO::getSingleton($option);
		//查询数据
		$sql = "SELECT shop_price FROM goods WHERE goods_id=$goods_id";
		$result = $dao -> getOne($sql); 
		return $result;
	}