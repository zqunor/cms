<?php
namespace framework\dao;
use framework\dao\I_DAO;
use \PDO;

class DAOPDO implements I_DAO
{	
	private $host;
	private $dbname;
	private $user;
	private $pass;
	private $port;
	private $charset;
	
	//该属性保存pdo对象
	private $pdo;
	
	//查询语句返回的结果集数量
	private $resultRows;
	
	//私有属性保存该该实例
	private static $instance;
	//私有的构造方法
	private function __construct($option=array())
	{
		//初始化服务器的配置
		$this -> initOptions($option);
		//初始化PDO对象
		$this -> initPDO();
	}
	//私有的克隆方法
	private function __clone()
	{
		
	}
	//公共的静态方法实例化单例对象
	public static function getSingleton($options=array())
	{
		if(!self::$instance instanceof self){
			//实例化
			self::$instance = new self($options);
		}
		return self::$instance;
	}
	//初始化服务器的配置
	private function initOptions($option)
	{
		$this -> host = isset($option['host'])?$option['host']:'';
		$this -> dbname = isset($option['dbname'])?$option['dbname']:'';
		$this -> user = isset($option['user'])?$option['user']:'';
		$this -> pass = isset($option['pass'])?$option['pass']:'';
		$this -> port = isset($option['port'])?$option['port']:'';
		$this -> charset = isset($option['charset'])?$option['charset']:'';
	}
	//初始化PDO对象
	private function initPDO()
	{
		$dsn = 
		"mysql:host=$this->host;dbname=$this->dbname;port=$this->port;charset=$this->charset";
		$this -> pdo = new PDO($dsn,$this->user,$this->pass);
	}
	//封装pdostatement对象
	public function query($sql="")
	{	
		//返回pdo_statement对象
		return $this->pdo -> query($sql);
	}
	//查询所有数据
	public function getAll($sql='')
	{
		$pdo_statement = $this->query($sql);

		if($pdo_statement==false){
			//输出SQL语句的错误信息
			$error_info = $this->pdo-> errorInfo();
			$err_str = "SQL语句错误，具体信息如下:<br>".$error_info[2];
			echo $err_str;
			return false;
		}
		$result = $pdo_statement -> fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	//查询一条记录
	public function getRow($sql='')
	{
		$pdo_statement = $this->query($sql);
		if($pdo_statement==false){
			//输出SQL语句的错误信息
			$error_info = $this->pdo-> errorInfo();
			$err_str = "SQL语句错误，具体信息如下:<br>".$error_info[2];
			echo $err_str;
			return false;
		}
		$result = $pdo_statement -> fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	//获得一个字段的值
	public function getOne($sql='')
	{
		$pdo_statement = $this->query($sql);
		if($pdo_statement==false){
			//输出SQL语句的错误信息
			$error_info = $this->pdo-> errorInfo();
			$err_str = "SQL语句错误，具体信息如下:<br>".$error_info[2];
			echo $err_str;
			return false;
		}
		//返回查询的字段的值，我们在执行sql语句之前就应该明确查询的是哪个字段，这样fetchColumn就已经知道查询的字段值
		$result = $pdo_statement -> fetchColumn();
		return $result;
	}
	//实现非查询的方法
	public function exec($sql='')
	{
		$result = $this->pdo -> exec($sql);
		//===为了区分 受影响的记录数是0的情况
		if($result===false){
			$error_info = $this->pdo-> errorInfo();
			$err_str = "SQL语句错误，具体信息如下:<br>".$error_info[2];
			echo $err_str;
			return false;
		}
		return $result;
	}
	//查询语句返回的结果数量
	public function resultRows()
	{
		return $this->resultRows;
	}
	//返回上次执行插入语句返回的主键值
	public function lastInsertId()
	{
		return $this->pdo->lastInsertId();
	}
	//数据转义并引号包裹
	public function escapeData($data='')
	{
		return $this->pdo->quote($data);
	}
}