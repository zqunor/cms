<?php
/**
 * Created by ZhouQ.
 * Time: 2016/9/26 22:57
 */

namespace home\model;

use framework\core\Model;

class GoodsModel extends Model {

  protected $table_name = 'ask_goods';

  public function getByName($name) {

    $sql = "select goods_name from {$this->true_table} where goods_name like '%$name%'";
    $res = $this->dao->getAll($sql);
    return $res;
  }
}