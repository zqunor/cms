<?php
/* Smarty version 3.1.29, created on 2017-02-05 22:42:24
  from "F:\Service\wamp64\www\cms\app\admin\view\topic\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_589739d0146f02_05075433',
  'file_dependency' => 
  array (
    '5b9b8d2f7f62aa36759a53602973124eb858894b' => 
    array (
      0 => 'F:\\Service\\wamp64\\www\\cms\\app\\admin\\view\\topic\\index.html',
      1 => 1483842672,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common.html' => 1,
  ),
),false)) {
function content_589739d0146f02_05075433 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'F:\\Service\\wamp64\\www\\cms\\framework\\vendor\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_28332589739cfc6d666_33343213',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:common.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:topic/index.html */
function block_28332589739cfc6d666_33343213($_smarty_tpl, $_blockParentStack) {
?>


<div class="aw-content-wrap">
  <div class="mod">
    <div class="mod-head">
      <h3>
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="javascript:;">话题管理</a></li>
          <li><a href="<?php echo framework\core\Factory::U('admin/topic/add');?>
">新建话题</a></li>
          <li><a data-toggle="tab" href="#search">搜索</a></li>
        </ul>
      </h3>
    </div>

    <div class="mod-body tab-content">
      <div id="list" class="tab-pane active">

        <div class="table-responsive">
          <form method="post" action="" id="batchs_form">
            <input type="hidden" value="" name="action" id="action">
            <input type="hidden" value="" name="parent_id" id="parent_id">

            <table class="table table-striped">
              <thead>
              <tr>
                <th>
                  <div class="icheckbox_square-blue" style="position: relative;">
                    <input type="checkbox" class="check-all" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;">
                    <ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                  </div>
                </th>
                <th>话题标题</th>
                <th>讨论</th>
                <th>关注</th>
                <th>最后编辑用户</th>
                <th>最后编辑时间</th>
                <th>操作</th>
              </tr>
              </thead>
              <tbody>
              <?php
$_from = $_smarty_tpl->tpl_vars['topics']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_0_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_0_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
              <tr>
                <td>
                  <div class="icheckbox_square-blue" style="position: relative;">
                    <input type="checkbox" value="4" name="topic_ids[]" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;">
                    <ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                  </div>
                </td>

                <td>
                  <a target="_blank" href=""><?php echo $_smarty_tpl->tpl_vars['row']->value['topic_title'];?>
</a>
                </td>

                <td>1</td>

                <td>1</td>

                <td><a target="_blank" href="">zhouqun</a></td>

                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['add_time'],'%Y-%m-%d %H:%M:%S');?>
</td>

                <td>
                  <a data-toggle="tooltip" title="" class="icon icon-edit md-tip"
                     href="?m=admin&c=topic&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['topic_id'];?>
" data-original-title="编辑"></a>
                  <a data-toggle="tooltip" title="" class="icon icon-delete md-tip"
                     href="?m=admin&c=topic&a=delete&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['topic_id'];?>
" data-original-title="删除"></a>
                </td>
              </tr>
              <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
?>
              </tbody>
            </table>
          </form>
        </div>

        <div class="mod-table-foot">
          <a onclick="$('#action').val('remove'); AWS.ajax_post($('#batchs_form'));" class="btn btn-danger">删除话题</a>
        </div>
      </div>

      <div id="search" class="tab-pane">
        <form role="form" class="form-horizontal" id="search_form" onsubmit="return false;"
              action="<?php echo framework\core\Factory::U('admin/topic/search');?>
" method="post">

          <input type="hidden" value="search" name="action">

          <div class="form-group">
            <label class="col-sm-2 col-xs-3 control-label">关键词:</label>

            <div class="col-sm-5 col-xs-8">
              <input type="text" name="keyword" value="" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 col-xs-3 control-label">添加时间范围:</label>

            <div class="col-sm-6 col-xs-9">
              <div class="row">
                <div class="col-xs-11  col-sm-5 mod-double">
                  <input type="text" name="start_date" value="" class="form-control mod-data">

                  <div class="date_selector" style="display: none;">
                    <div class="nav"><p class="month_nav"><span title="[Page-Up]" class="buttonx prev">«</span> <span
                      class="month_name">二月</span> <span title="[Page-Down]" class="buttonx next">»</span></p>

                      <p class="year_nav"><span title="[Ctrl+Page-Up]" class="buttonx prev">«</span> <span
                        class="year_name">2016</span> <span title="[Ctrl+Page-Down]" class="buttonx next">»</span></p>
                    </div>
                    <table>
                      <thead>
                      <tr>
                        <th>一</th>
                        <th>二</th>
                        <th>三</th>
                        <th>四</th>
                        <th>五</th>
                        <th>六</th>
                        <th>日</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td date="2016-01-31" class="unselected_month">31</td>
                        <td date="2016-02-01" class="selectable_day">1</td>
                        <td date="2016-02-02" class="selectable_day">2</td>
                        <td date="2016-02-03" class="selectable_day">3</td>
                        <td date="2016-02-04" class="selectable_day">4</td>
                        <td date="2016-02-05" class="selectable_day">5</td>
                        <td date="2016-02-06" class="selectable_day">6</td>
                      </tr>
                      <tr>
                        <td date="2016-02-07" class="selectable_day">7</td>
                        <td date="2016-02-08" class="selectable_day">8</td>
                        <td date="2016-02-09" class="selectable_day">9</td>
                        <td date="2016-02-10" class="selectable_day">10</td>
                        <td date="2016-02-11" class="selectable_day">11</td>
                        <td date="2016-02-12" class="selectable_day">12</td>
                        <td date="2016-02-13" class="selectable_day">13</td>
                      </tr>
                      <tr>
                        <td date="2016-02-14" class="selectable_day">14</td>
                        <td date="2016-02-15" class="selectable_day">15</td>
                        <td date="2016-02-16" class="selectable_day">16</td>
                        <td date="2016-02-17" class="selectable_day">17</td>
                        <td date="2016-02-18" class="selectable_day">18</td>
                        <td date="2016-02-19" class="selectable_day">19</td>
                        <td date="2016-02-20" class="selectable_day">20</td>
                      </tr>
                      <tr>
                        <td date="2016-02-21" class="selectable_day">21</td>
                        <td date="2016-02-22" class="selectable_day">22</td>
                        <td date="2016-02-23" class="selectable_day">23</td>
                        <td date="2016-02-24" class="selectable_day">24</td>
                        <td date="2016-02-25" class="selectable_day">25</td>
                        <td date="2016-02-26" class="selectable_day">26</td>
                        <td date="2016-02-27" class="selectable_day">27</td>
                      </tr>
                      <tr>
                        <td date="2016-02-28" class="selectable_day today selected">28</td>
                        <td date="2016-02-29" class="selectable_day">29</td>
                        <td date="2016-03-01" class="unselected_month">1</td>
                        <td date="2016-03-02" class="unselected_month">2</td>
                        <td date="2016-03-03" class="unselected_month">3</td>
                        <td date="2016-03-04" class="unselected_month">4</td>
                        <td date="2016-03-05" class="unselected_month">5</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <i class="icon icon-date"></i>
                </div>
                                    <span class="mod-symbol col-xs-1 col-sm-1">
                                    -
                                    </span>

                <div class="col-xs-11 col-sm-5">
                  <input type="text" name="end_date" value="" class="form-control mod-data">

                  <div class="date_selector" style="display: none;">
                    <div class="nav"><p class="month_nav"><span title="[Page-Up]" class="buttonx prev">«</span> <span
                      class="month_name">二月</span> <span title="[Page-Down]" class="buttonx next">»</span></p>

                      <p class="year_nav"><span title="[Ctrl+Page-Up]" class="buttonx prev">«</span> <span
                        class="year_name">2016</span> <span title="[Ctrl+Page-Down]" class="buttonx next">»</span></p>
                    </div>
                    <table>
                      <thead>
                      <tr>
                        <th>一</th>
                        <th>二</th>
                        <th>三</th>
                        <th>四</th>
                        <th>五</th>
                        <th>六</th>
                        <th>日</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td date="2016-01-31" class="unselected_month">31</td>
                        <td date="2016-02-01" class="selectable_day">1</td>
                        <td date="2016-02-02" class="selectable_day">2</td>
                        <td date="2016-02-03" class="selectable_day">3</td>
                        <td date="2016-02-04" class="selectable_day">4</td>
                        <td date="2016-02-05" class="selectable_day">5</td>
                        <td date="2016-02-06" class="selectable_day">6</td>
                      </tr>
                      <tr>
                        <td date="2016-02-07" class="selectable_day">7</td>
                        <td date="2016-02-08" class="selectable_day">8</td>
                        <td date="2016-02-09" class="selectable_day">9</td>
                        <td date="2016-02-10" class="selectable_day">10</td>
                        <td date="2016-02-11" class="selectable_day">11</td>
                        <td date="2016-02-12" class="selectable_day">12</td>
                        <td date="2016-02-13" class="selectable_day">13</td>
                      </tr>
                      <tr>
                        <td date="2016-02-14" class="selectable_day">14</td>
                        <td date="2016-02-15" class="selectable_day">15</td>
                        <td date="2016-02-16" class="selectable_day">16</td>
                        <td date="2016-02-17" class="selectable_day">17</td>
                        <td date="2016-02-18" class="selectable_day">18</td>
                        <td date="2016-02-19" class="selectable_day">19</td>
                        <td date="2016-02-20" class="selectable_day">20</td>
                      </tr>
                      <tr>
                        <td date="2016-02-21" class="selectable_day">21</td>
                        <td date="2016-02-22" class="selectable_day">22</td>
                        <td date="2016-02-23" class="selectable_day">23</td>
                        <td date="2016-02-24" class="selectable_day">24</td>
                        <td date="2016-02-25" class="selectable_day">25</td>
                        <td date="2016-02-26" class="selectable_day">26</td>
                        <td date="2016-02-27" class="selectable_day">27</td>
                      </tr>
                      <tr>
                        <td date="2016-02-28" class="selectable_day today selected">28</td>
                        <td date="2016-02-29" class="selectable_day">29</td>
                        <td date="2016-03-01" class="unselected_month">1</td>
                        <td date="2016-03-02" class="unselected_month">2</td>
                        <td date="2016-03-03" class="unselected_month">3</td>
                        <td date="2016-03-04" class="unselected_month">4</td>
                        <td date="2016-03-05" class="unselected_month">5</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <i class="icon icon-date"></i>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 col-xs-3 control-label">作者:</label>

            <div class="col-sm-5 col-xs-8">
              <input type="text" name="user_name" value="" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 col-xs-3 control-label">讨论数:</label>

            <div class="col-sm-6 col-xs-9">
              <div class="row">
                <div class="col-xs-11  col-sm-5 mod-double">
                  <input type="text" value="" name="discuss_count_min" class="form-control">
                </div>
                                    <span class="mod-symbol col-xs-1 col-sm-1">
                                    -
                                    </span>

                <div class="col-xs-11 col-sm-5">
                  <input type="text" value="" name="discuss_count_max" class="form-control">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5 col-xs-8">
              <button class="btn btn-primary" onclick="AWS.ajax_post($('#search_form'));" type="button">搜索</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<?php
}
/* {/block 'content'} */
}
