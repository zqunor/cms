<?php
/* Smarty version 3.1.29, created on 2017-02-19 14:18:52
  from "F:\Service\wamp64\www\cms\app\home\view\common\common.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58a938cce18275_75915278',
  'file_dependency' => 
  array (
    '343ecf455d9a7833057722017e20dfc4a5ef0402' => 
    array (
      0 => 'F:\\Service\\wamp64\\www\\cms\\app\\home\\view\\common\\common.html',
      1 => 1487485089,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58a938cce18275_75915278 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html class="">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta content="IE=edge,Chrome=1" http-equiv="X-UA-Compatible">
  <meta content="webkit" name="renderer">
  <title><?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'title', array (
  0 => 'block_394558a938ccd47089_02345695',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
but问答</title>
  <meta content="but问答,知识社区,社交社区,问答社区" name="keywords">
  <meta content="but问答 社交化知识社区" name="description">


  <base href="">
  <!--[if IE]>
  </base>
  <![endif]-->

  <link type="image/x-icon" rel="shortcut icon" href="{PUBLIC_HOME}css/default/img/favicon.ico">

  <link type="text/css" rel="stylesheet" href="<?php echo PUBLIC_HOME;?>
css/bootstrap.css">
  <link type="text/css" rel="stylesheet" href="<?php echo PUBLIC_HOME;?>
css/icon.css">
  <link type="text/css" rel="stylesheet" href="<?php echo PUBLIC_HOME;?>
css/default/common.css">
  <link type="text/css" rel="stylesheet" href="<?php echo PUBLIC_HOME;?>
css/default/link.css">
  <link type="text/css" rel="stylesheet" href="<?php echo PUBLIC_HOME;?>
js/plug_module/style.css">

  <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "cssjs", array (
  0 => 'block_1585458a938ccd65863_45299948',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


  <?php echo '<script'; ?>
 type="text/javascript">
      var _90DB43ABD4D2EFB80B143A0DF5B3B668 = "18C84670BD4E0E36";
      var G_POST_HASH = _90DB43ABD4D2EFB80B143A0DF5B3B668;
      var G_INDEX_SCRIPT = "?/";
      var G_SITE_NAME = "WeCenter";
      var G_BASE_URL = "";
      var G_STATIC_URL = "static";
      var G_UPLOAD_URL = "uploads";
      var G_USER_ID = "1";
      var G_USER_NAME = "zhouqun";
      var G_UPLOAD_ENABLE = "Y";
      var G_UNREAD_NOTIFICATION = 0;
      var G_NOTIFICATION_INTERVAL = 100000;
      var G_CAN_CREATE_TOPIC = "1";
      var G_ADVANCED_EDITOR_ENABLE = "Y";

  <?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PUBLIC_HOME;?>
js/jquery.2.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PUBLIC_HOME;?>
js/jquery.form.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PUBLIC_HOME;?>
js/plug_module/plug-in_module.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PUBLIC_HOME;?>
js/aws.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PUBLIC_HOME;?>
js/aw_template.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PUBLIC_HOME;?>
js/app.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PUBLIC_HOME;?>
js/compatibility.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PUBLIC_HOME;?>
js/common.js"><?php echo '</script'; ?>
>
  <!--[if lte IE 8]>
  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PUBLIC_HOME;?>
js/respond.js"><?php echo '</script'; ?>
>
  <![endif]-->
  <style type="text/css">.fancybox-margin {
    margin-right: 17px;
  }</style>

  <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'cssjs', array (
  0 => 'block_475158a938ccd85528_26533743',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


</head>
<body>
<noscript id="noscript" unselectable="on">
  <div class="aw-404 aw-404-wrap container">
    <img src="<?php echo PUBLIC_HOME;?>
common/no-js.jpg">
    <p>你的浏览器禁用了JavaScript, 请开启后刷新浏览器获得更好的体验!</p>
  </div>
</noscript>

<div class="aw-top-menu-wrap">
  <div class="container">
    <!-- logo -->
    <div class="aw-logo hidden-xs">
      <a href="<?php echo framework\core\Factory::U('home/index/index');?>
"></a>
    </div>
    <!-- end logo -->
    <!-- 搜索框 -->
    <div class="aw-search-box  hidden-xs hidden-sm">
      <form method="post" id="global_search_form" action="<?php echo framework\core\Factory::U('home/index/search');?>
" class="navbar-search">
        <input type="text" id="aw-search-query" name="q" autocomplete="off" placeholder="搜索问题、话题或人"
            class="form-control search-query">
        <span onclick="$('#global_search_form').submit();" id="global_search_btns" title="搜索"> <i
            class="icon icon-search"></i>
        </span>

        <div class="aw-dropdown">
          <div class="mod-body">
            <p class="title">输入关键字进行搜索</p>
            <ul class="aw-dropdown-list hide"></ul>
            <p class="search">
              <span>搜索:</span>
              <a onclick="$('#global_search_form').submit();"></a>
            </p>
          </div>
          <div class="mod-footer">
            <a class="pull-right btn btn-mini btn-success publish" onclick="" href="<?php echo framework\core\Factory::U('home/question/add');?>
">发起问题</a>
          </div>
        </div>
      </form>
    </div>
    <!-- end 搜索框 -->
    <!-- 导航 -->
    <div class="aw-top-nav navbar">
      <div class="navbar-header">
        <button class="navbar-toggle pull-left">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
        <ul class="nav navbar-nav">
          <li>
            <a class="active" href="<?php echo framework\core\Factory::U('home/index/index');?>
"> <i class="icon icon-list"></i>
              发现
            </a>
          </li>
          <li>
            <a href="<?php echo framework\core\Factory::U('home/topic/index');?>
">
              <i class="icon icon-topic"></i>
              话题
            </a>
          </li>
          <li>
            <a style="font-weight:bold;">· · ·</a>

            <div class="dropdown-list pull-right">
              <ul id="extensions-nav-list"></ul>
            </div>
          </li>
        </ul>
      </nav>
    </div>
    <!-- end 导航 -->
    <div class="aw-user-nav">

      <?php if ((isset($_SESSION['user']))) {?>
      <!-- 登陆成功展示用户栏 -->
      <a class="aw-user-nav-dropdown" href="">
        <img src="<?php echo THUMB_PATH;
echo $_SESSION['user']['user_thumb'];?>
" alt="zhouqun">
        <?php echo $_SESSION['user']['username'];?>
欢迎您!
      </a>
      <div class="aw-dropdown dropdown-list pull-right">
        <ul class="aw-dropdown-list">
          <li class="hidden-xs">
            <a href="<?php echo framework\core\Factory::U('home/user/edit');?>
">
              <i class="icon icon-setting"></i>
              设置
            </a>
          </li>
          <li class="hidden-xs">
            <a href="<?php echo framework\core\Factory::U('admin/user/login');?>
">
              <i class="icon icon-job"></i>
              管理
            </a>
          </li>
          <li>
            <a href="<?php echo framework\core\Factory::U('home/user/logout');?>
">
              <i class="icon icon-logout"></i>
              退出
            </a>
          </li>
        </ul>
      </div>
      <!-- end 登陆&注册栏 -->

      <?php } else { ?>
      <!-- 未登录展示 -->
      <!-- 登陆&注册栏 -->
      <a href="<?php echo framework\core\Factory::U('home/user/login');?>
" class="login btn btn-normal btn-primary">登录</a>
      <a href="<?php echo framework\core\Factory::U('home/user/register');?>
" class="register btn btn-normal btn-success">注册</a>
      <!-- end 登陆&注册栏 -->

      <?php }?>
    </div>
    <!-- end 用户栏 -->
    <!-- 发起 -->
    <div class="aw-publish-btn">

      <a onclick="AWS.dialog('publish', {'category_enable':'1', 'category_id':'0', 'topic_title':''}); return false;" class="btn-primary" id="header_publish">
        <i class="icon icon-ask"></i>
        发起
      </a>

      <div class="dropdown-list pull-right">
        <ul>
          <li>
            <a onclick="" href="<?php echo framework\core\Factory::U('home/question/add');?>
">问题</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- end 发起 -->
  </div>
</div>

<!-- 定义该地方将来被继承并重写 -->
<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_1052458a938cce06fb9_40681679',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<div class="aw-footer-wrap">
  <div class="aw-footer">
    Copyright &copy; 2016-2099, All Rights Reserved
    <span class="hidden-xs">
    Powered By
    <a target="blank" href="http://www.zqblogs.cn/">but问答 1.0</a>
    </span>

  </div>
</div>

</body>
</html><?php }
/* {block 'title'}  file:common/common.html */
function block_394558a938ccd47089_02345695($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'title'} */
/* {block 'cssjs'}  file:common/common.html */
function block_1585458a938ccd65863_45299948($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'cssjs'} */
/* {block 'cssjs'}  file:common/common.html */
function block_475158a938ccd85528_26533743($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'cssjs'} */
/* {block 'content'}  file:common/common.html */
function block_1052458a938cce06fb9_40681679($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'content'} */
}
