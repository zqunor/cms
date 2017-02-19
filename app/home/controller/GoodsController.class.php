<?php
/**
 * Created by ZhouQ.
 * Time: 2016/9/26 22:56
 */

namespace home\controller;

use framework\core\Controller;

class GoodsController extends Controller {
  public function getSuggest() {
    $name = $_POST['name'];
    echo $name;
    $goods_model = Factory::M('Goods');
    $res = $goods_model->getByName($name);
  }
}