<?php
namespace framework\core;

use framework\dao\DAOPDO;

class Model {
  protected $dao;
  protected $true_table;
  //保存当前数据表的所有字段，万一后面使用其他字段
  protected $field_list = array();
  // 错误信息
  protected $error = array();

  //数据表名
  protected $table_name;

  public function __construct() {
    $this->initDAO();
    //初始化当前的表名，谁继承Model，$this->table_name指的就是谁
    $this->initTable();
    //初始化字段列表
    $this->initField();
  }

  //遍历错误信息
  public function getError() {
    $error_mess = '';
    foreach ( $this->error as $v ) {
      $error_mess .= $v . '<br>';
    }
    return $error_mess;
  }

  public function initDAO() {
    $option = $GLOBALS['config'];

    //实例化PDO对象
    $this->dao = DAOPDO::getSingleton($option);
  }

  public function initTable() {

    //拼接表名  INSERT INTO `goods`
    //$this -> true_table = '`'.$this->table_name.'`';
    //根据模型名计算出该模型对应的表名
    $class_name = strtolower(basename(get_class($this)));
    $class_name = substr($class_name , 0 , -5);
    $reg = '/(?<=[a-z])([A-Z])/'; //逆向预查
    $table_name = preg_replace($reg , '_$1' , $class_name);
    $this->table_name = $GLOBALS['config']['table_prefix'] . $table_name;
    $this->true_table = '`' . $this->table_name . '`';
    return $this->true_table;
  }

  //初始化数据表的所有字段
  private function initField() {
    $sql = "DESC $this->true_table";
    $result = $this->dao->getAll($sql);
    foreach ( $result as $v ) {
      $this->field_list[] = $v['Field'];
      if ($v['Key'] == 'PRI') {
        //该字段是主键，将其保存到属性上面，方便其他方法使用
        $this->field_list['pk'] = $v['Field'];
      }
    }
  }
  //自动插入的操作
  /*
   * @param	$data  array('goods_name'=>'iphone 6s','shop_price'=>'5888.00')
   * return 成功返回lastInsertId()		失败返回false
   */
  public function insert($data) {
    //sql = "INSERT INTO `goods`(`goods_name`,`shop_price`) VALUES('iphone 6s','5888.00')"
    //拼接上面的SQL语句
    $sql = "INSERT INTO $this->true_table";
    //拼接字段部分（传递的数组的下标）
    $fields = array_keys($data);
    $fields = array_map(function ($v) {
      return '`' . $v . '`';
    } , $fields);
    $fields = implode(',' , $fields);
    $sql .= "(" . $fields . ")";

    //拼接VALUES部分
    $values = array_values($data);
    //对字段的值进行引号转义并包裹防止sql注入
    $values = array_map(array($this->dao , "escapeData") , $values);
    $values = implode(',' , $values);
    $sql .= " VALUES($values)";
    //执行sql语句
    $result = $this->dao->exec($sql);
    //插入成功之后应该返回刚刚插入的记录的主键值
    return $this->dao->lastInsertId();
  }

  /*
   * 自动删除的操作
   * @param	$pk	主键
   * return	成功返回true，失败返回false
   */
  protected function delete($pk) {
    //$sql = "DELETE FROM goods WHERE id=$pk";
    $sql = "DELETE FROM $this->true_table WHERE {$this->field_list['pk']}=$pk";
    //die($sql);
    return $this->dao->exec($sql);
  }

  /*
   * 自动查询操作
   * @param	$pk主键
   * @param	$fields	查询的字段 array('goods_name','shop_price')
   * return	array()	字段的值，失败返回false
   */
  public function find($pk_value = null , $fields = null) {
    //最终：$SQL = "SELECT `goods_name` FROM goods WHERE goods_id=$pk_value";
    $pk = $this->field_list['pk'];  //先获得主键
    //获得查询的字段
    if (!is_null($fields)) {
      //获得查询的字段列表
      $field_list = array_map(function ($v) {
        return '`' . $v . '`';
      } , $fields);
      $field_list = implode(',' , $field_list);
    } else {
      //查询所有字段
      $field_list = '*';
    }
    if (is_null($pk_value)) {
      $where = '';
    } else {
      $where = "WHERE {$this->field_list['pk']}=$pk_value";
    }
    $sql = "SELECT $field_list FROM $this->true_table " . $where;
    if ($where == '') {
      return $this->dao->getAll($sql);
    } else {
      return $this->dao->getRow($sql);
    }

  }

  /*
   * 自动更新操作
   * @param	array  $data 更新的字段  $data = array('goods_name'=>'iphone 6s','id'=>1)
   * @param	$where	更新的条件
   * 			$sql = "UPDATE user SET 字段=值，字段=值 WHERE id=1";
           $sql = "UPDATE user SET 字段=值,字段=值 WHERE username='阿猫'";
   * return 成功返回true，失败返回false
   */
  public function update($data , $where = null) {
    $pk = $this->field_list['pk'];  //主键 goods_id
    if (!is_null($where)) {
      foreach ( $where as $k => $v ) {
        $where_str = '`' . $k . '`' . "= '$v'";
      }
    } else if (isset($data[$pk])) {
      //判断更新的字段里面有没有主键
      $where_str = "`" . $pk . "`" . "= $data[$pk]";    //`goods_id`=1
    } else {
      //上面的条件都不成立的时候
      return false;
    }
    //拼接更新的字段
    foreach ( $data as $k => $v ) {
      $arr[] = '`' . $k . '`' . "= '$v'";  //`goods_name`='uphone',`shop_price`=''
    }
    $fields = implode(',' , $arr);
    //拼接SQL
    $sql = "UPDATE $this->true_table SET $fields WHERE $where_str";
    return $this->dao->exec($sql);
  }
}