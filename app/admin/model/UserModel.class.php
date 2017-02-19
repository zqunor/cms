<?php
/**
 * UserModel.class.php
 * @author: zq <zhouqun195@163.com>
 * @createAt: 2017/1/7 17:56
 */

namespace admin\model;

use framework\core\Model;

class UserModel extends Model
{
    protected $table_name = 'ask_user';

    public function getUsers()
    {
        $sql = "SELECT * FROM $this->true_table";
        $user_list = $this->dao->getAll($sql);
        return $user_list;
    }

    public function getOneById($user_id)
    {
        $sql = "SELECT * FROM $this->true_table WHERE user_id = $user_id";
        $user = $this->dao->getRow($sql);
        return $user;
    }
}