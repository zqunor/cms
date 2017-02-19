<?php
/* Smarty version 3.1.29, created on 2017-02-03 20:14:04
  from "F:\Service\wamp64\www\cms\app\home\view\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5894740cd21680_38693185',
  'file_dependency' => 
  array (
    'e87cd58ef6b4382fa4ff3cbe32de6ef0f4832a55' => 
    array (
      0 => 'F:\\Service\\wamp64\\www\\cms\\app\\home\\view\\index.html',
      1 => 1486124037,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/common.html' => 1,
  ),
),false)) {
function content_5894740cd21680_38693185 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'F:\\Service\\wamp64\\www\\cms\\framework\\vendor\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_145555894740c72b580_64886957',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:common/common.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'}  file:index.html */
function block_145555894740c72b580_64886957($_smarty_tpl, $_blockParentStack) {
?>

<div class="aw-container-wrap">
  <div class="container category">
    <div class="row">
      <div class="col-sm-12">
        <?php
$_from = $_smarty_tpl->tpl_vars['cat_list']->value;
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
        <dl>
          <dt>
            <img alt="" src="<?php echo THUMB_PATH;
echo $_smarty_tpl->tpl_vars['row']->value['cat_logo'];?>
">
          </dt>
          <dd>
            <p class="title">
              <a href=""><?php echo $_smarty_tpl->tpl_vars['row']->value['cat_name'];?>
</a>
            </p>
            <span>默认分类描述</span>
          </dd>
        </dl>
        <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
?>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="aw-content-wrap clearfix">
        <div class="col-sm-12 col-md-9 aw-main-content">
          <!-- end 新消息通知 -->
          <!-- tab切换 -->
          <ul class="nav nav-tabs aw-nav-tabs active hidden-xs">
            <li>
              <a href="">等待回复</a>
            </li>
            <li>
              <a id="sort_control_hot" href="">热门</a>
            </li>
            <li>
              <a href="">推荐</a>
            </li>
            <li class="active">
              <a href="">最新</a>
            </li>

            <h2 class="hidden-xs">
              <i class="icon icon-list"></i>
              发现
            </h2>
          </ul>
          <!-- end tab切换 -->


          <div class="aw-mod aw-explore-list">
            <!--问题列表-->
            <div class="mod-body">
              <div class="aw-common-list" id="question_list">
                <!--  <?php
$_from = $_smarty_tpl->tpl_vars['questions']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_1_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_1_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
                --<div data-topic-id="2," class="aw-item active">
                    <a rel="nofollow" href="people.html" data-id="1" class="aw-user-name hidden-xs">
                      <img alt="" src="<?php echo PUBLIC_HOME;?>
common/avatar-max-img.png"></a>

                    <div class="aw-question-content">
                      <h4>
                        <a href="<?php echo STATIC_PATH;
echo $_smarty_tpl->tpl_vars['row']->value['static_url'];?>
">
                          <?php echo $_smarty_tpl->tpl_vars['row']->value['question_title'];?>

                        </a>
                      </h4>
                      <a class="pull-right text-color-999" href="">回复</a>

                      <p>
                        <a href="category.html" class="aw-question-tags">
                          <?php echo $_smarty_tpl->tpl_vars['row']->value['cat_name'];?>

                        </a>•
                        <a class="aw-user-name" href="people.html"><?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
</a>
                        <span class="text-color-999">发起了问题 •
                        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['focus_count'])===null||$tmp==='' ? 0 : $tmp);?>
 人关注 •
                        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['reply_count'])===null||$tmp==='' ? 0 : $tmp);?>
个回复 •
                        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['view_count'])===null||$tmp==='' ? 0 : $tmp);?>
次浏览 •
                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['pub_time'],'%Y-%m-%d %H:%M:%S');?>

                        </span>
                        <span class="text-color-999 related-topic hide">• 来自相关话题</span>
                      </p>
                    </div>
                  </div>
                  <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_1_saved_local_item;
}
if ($__foreach_row_1_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_1_saved_item;
}
?>-->
              </div>
            </div>
            <!--end问题列表-->

            <!--分页导航-->
            <div class="mod-footer">
              <div class="page-control" id="page_bar">
                <?php echo $_smarty_tpl->tpl_vars['page_html']->value;?>

              </div>
            </div>
            <!--end分页导航-->
          </div>

        </div>

        <!-- 侧边栏 -->
        <div class="col-sm-12 col-md-3 aw-side-bar hidden-xs hidden-sm">
          <div class="aw-mod aw-text-align-justify">
            <div class="mod-head">
              <a class="pull-right" href="topic_index.html">更多 &gt;</a>

              <h3>热门话题</h3>
            </div>
            <div class="mod-body">
              <?php
$_from = $_smarty_tpl->tpl_vars['hot_topics']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_2_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_2_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
              <dl>
                <dt class="pull-left aw-border-radius-5">
                  <a href="topic.html">
                    <img src="<?php echo PUBLIC_HOME;?>
common/topic-mid-img.png" alt=""></a>
                </dt>
                <dd class="pull-left">
                  <p class="clearfix">
										<span class="topic-tag">
											<a data-id="2" class="text" href="topic.html">
                        <?php echo $_smarty_tpl->tpl_vars['row']->value['topic_title'];?>

                      </a>
										</span>
                  </p>

                  <p>
                    <b><?php echo $_smarty_tpl->tpl_vars['row']->value['q_num'];?>
</b>个问题,
                    <b><?php echo $_smarty_tpl->tpl_vars['row']->value['user_num'];?>
</b>人关注
                  </p>
                </dd>
              </dl>
              <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_2_saved_local_item;
}
if ($__foreach_row_2_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_2_saved_item;
}
?>
            </div>
          </div>
          <div class="aw-mod aw-text-align-justify">
            <div class="mod-head">
              <a class="pull-right" href="?/people/">更多 &gt;</a>

              <h3>热门用户</h3>
            </div>
            <div class="mod-body">
              <?php
$_from = $_smarty_tpl->tpl_vars['hot_user']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_3_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_3_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
              <dl>
                <dt class="pull-left aw-border-radius-5">
                  <a href="people.html">
                    <img src="<?php echo THUMB_PATH;
echo $_smarty_tpl->tpl_vars['row']->value['user_thumb'];?>
" alt=""></a>
                </dt>
                <dd class="pull-left">
                  <a class="aw-user-name" data-id="2" href="people.html">
                    <?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>

                  </a>

                  <p class="signature"></p>

                  <p>
                    <b><?php echo $_smarty_tpl->tpl_vars['row']->value['q_num'];?>
</b>
                    个问题
                  </p>
                </dd>
              </dl>
              <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_3_saved_local_item;
}
if ($__foreach_row_3_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_3_saved_item;
}
?>
            </div>
          </div>
        </div>
        <!-- end 侧边栏 -->
      </div>
    </div>
  </div>
</div>
<?php echo '<script'; ?>
>
  goPage(1);
  function goPage(page){
    $$.request({
      method: 'post',
      url: "<?php echo framework\core\Factory::U('home/index/getQuestions');?>
",
      data:'page='+page,
      callback:function(res){
        eval('var obj ='+res);
        //获取问题列表的div标签
        var oQuestion = $('question_list');
        var page_bar = $('page_bar');

        var questions = obj.list;
        oQuestion.innerHTML='';
        for(var i = 0; i < questions.length ; i++){
          var time = questions[i]['pub_time']; //1483970035
          var today = new Date().getTime();

          //当前时间和发布时间的间隔天数
          var days =Math.floor((today - time*1000)/(1000*3600*24)) ;
          var hours = (today - time)/(1000*3600);
          var min = (today - time)/(1000*3600)*60;
          var des = '';
          //如果时间间隔大于3天，转化为年月日格式
          if (days > 3){

            var date = new Date(time*1000);
            var year = date.getFullYear();
            var month = date.getMonth() + 1;
            var day = date.getDate();
            des = year + '-' + month + '-' + day;

          }else if (days >= 1 && days <= 3){
            des = days + '天前';
          }else if (hours > 1){
            des = hours + '小时前';
          }else if (min > 1){
            des = min + '分钟前';
          }else{
            des = '刚刚';
          }
          //如果时间大于1天，显示几天前

          var question = '<div data-topic-id="2," class="aw-item active"><a rel="nofollow" href="" data-id="1" class="aw-user-name hidden-xs"><img alt="" src="<?php echo PUBLIC_HOME;?>
common/avatar-img.png"></a><div class="aw-question-content"><h4><a href="<?php echo STATIC_PATH;?>
'+questions[i]['static_url']+'">'+questions[i]['question_title']+'</a></h4><a class="pull-right text-color-999" href="">回复</a><p><a href="" class="aw-question-tags">'+questions[i]['cat_name']+'</a>•<a class="aw-user-name" href="">'+questions[i]['username']+'</a> <span class="text-color-999">发起了问题 •'+(questions[i]['focus_count']?questions[i]['focus_count']:0)+'人关注 •'+(questions[i]['replay_count']?questions[i]['replay_count']:0)+'个回复 •'+(questions[i]['view_count']?questions[i]['view_count']:0)+'次浏览 • ' + des + '</span><span class="text-color-999 related-topic hide">• 来自相关话题</span></p></div></div>';

          oQuestion.innerHTML += question;
        }

        page_bar.innerHTML = obj.page_html;

      }
    });
  }


<?php echo '</script'; ?>
>
<?php
}
/* {/block 'content'} */
}
