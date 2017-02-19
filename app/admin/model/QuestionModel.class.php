<?php
/**
 * Created by ZhouQ.
 * Time: 2016/9/11 15:33
 */

namespace admin\model;

use framework\core\Model;

class QuestionModel extends Model {
    protected $table_name = 'ask_question';
  public function getQuestions() {
//question_id,question_title,answer_num,scan_num, user_name, pub_time,last_update_time
    $sql = "SELECT * FROM $this->true_table";
    $result = $this->dao->getAll($sql);
    return $result;
  }
}