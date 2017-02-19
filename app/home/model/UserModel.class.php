<?php
namespace home\model;

use framework\core\Model;

class UserModel extends Model {
  protected $table_name = 'ask_user';

  public function getHotUser() {
    $sql = "SELECT u.user_id,u.user_thumb,u.username,count(q.question_id) AS q_num FROM ask_user AS u LEFT JOIN ask_question AS q ON u.user_id=q.user_id GROUP BY u.user_id ORDER BY q_num DESC";
    return $this->dao->getAll($sql);
  }

  //查询用户名
  public function getByName($username) {
    $sql = "SELECT * FROM $this->true_table WHERE username='$username'";
    return $this->dao->getRow($sql);
  }

    public function getById($userId) {
        $sql = "SELECT * FROM $this->true_table WHERE user_id='$userId'";
        return $this->dao->getRow($sql);
    }

}