<?php
/* Smarty version 3.1.29, created on 2017-02-05 22:42:24
  from "F:\Service\wamp64\www\cms\app\admin\view\common.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_589739d090e974_86473572',
  'file_dependency' => 
  array (
    'f37ca9a30b50a99bea73669cea4956ec209aafb9' => 
    array (
      0 => 'F:\\Service\\wamp64\\www\\cms\\app\\admin\\view\\common.html',
      1 => 1483849176,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589739d090e974_86473572 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="webkit" name="renderer">
  <meta content="IE=edge,Chrome=1" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1,maximum-scale=1" name="viewport">
  <meta content="yes" name="apple-mobile-web-app-capable">
  <meta content="blank" name="apple-mobile-web-app-status-bar-style">
  <meta content="telephone=no" name="format-detection">

  <title>分类管理-有问必答</title>
  <!--<link type="image/x-icon" rel="shortcut icon" href="{PUBLIC_HOME}css/default/img/favicon.ico">-->
  <link href="<?php echo PUBLIC_HOME;?>
css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="<?php echo PUBLIC_HOME;?>
css/icon.css" rel="stylesheet" type="text/css">
  <link href="<?php echo PUBLIC_ADMIN;?>
css/common.css" rel="stylesheet" type="text/css">
  <?php echo '<script'; ?>
 src="<?php echo PUBLIC_HOME;?>
js/jquery.2.js" type="text/javascript"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo PUBLIC_HOME;?>
js/jquery.form.js" type="text/javascript"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo PUBLIC_ADMIN;?>
js/framework.js" type="text/javascript"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo PUBLIC_ADMIN;?>
js/global.js" type="text/javascript"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo PUBLIC_ADMIN;?>
/js/aws_admin.js" type="text/javascript"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo PUBLIC_ADMIN;?>
/js/aws_admin_template.js" type="text/javascript"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo PUBLIC_ADMIN;?>
/js/echarts-data.js" type="text/javascript"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo PUBLIC_ADMIN;?>
/js/echarts.js" type="text/javascript"><?php echo '</script'; ?>
>

  <!--[if lte IE 8]>
  <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo PUBLIC_HOME;?>
js/respond.js"><?php echo '</script'; ?>
>
  <![endif]-->
</head>

<body>
<div class="aw-header">
  <button class="btn btn-sm mod-head-btn pull-left">
    <i class="icon icon-bar"></i>
  </button>

  <div class="mod-header-user">
    <ul class="pull-right">

      <li class="dropdown username">
        <a data-toggle="dropdown" class="dropdown-toggle" href="">
          <img width="30" class="img-circle" src="<?php echo PUBLIC_HOME;?>
common/avatar-img.png">
          zhouqun
          <span class="caret"></span>
        </a>

        <ul class="dropdown-menu pull-right mod-user">
          <li>
            <a target="_blank" href="">
              <i class="icon icon-user"></i>
              账户
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
      </li>
    </ul>
  </div>
</div>
<div id="aw-side" class="aw-side ps-container">
  <div class="mod">
    <div class="mod-logo">
      <img alt="" src="<?php echo PUBLIC_ADMIN;?>
img/logo.png" class="pull-left">
      <h1>有问必答</h1>
    </div>

    <div class="mod-message">
      <div class="message">
        <a title="首页" target="_blank" href="<?php echo framework\core\Factory::U('admin/index/index');?>
" class="btn btn-sm">
          <i class="icon icon-home"></i>
        </a>

        <a title="退出" href="<?php echo framework\core\Factory::U('admin/user/logout');?>
" class="btn btn-sm">
          <i class="icon icon-logout"></i>
        </a>
      </div>
    </div>

    <ul class="mod-bar">
      <input type="hidden" val="0" id="hide_values">
      <li>
        <a class=" icon icon-ul" href="<?php echo framework\core\Factory::U('admin/index/index');?>
">
          <span>摘要信息</span>
        </a>
      </li>

      <li>
        <a data="icon" class=" icon icon-reply active" href="javascript:;">
          <span>内容管理</span>
        </a>

        <ul class="hide" style="display: block;">
          <li>
            <a class="active" href="<?php echo framework\core\Factory::U('admin/category/index');?>
">
              <span>分类管理</span>
            </a>
          </li>
          <li>
            <a href="<?php echo framework\core\Factory::U('admin/question/index');?>
">
              <span>问题管理</span>
            </a>
          </li>
          <li>
            <a href="<?php echo framework\core\Factory::U('admin/topic/index');?>
">
              <span>话题管理</span>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a data="icon" class=" icon icon-user" href="javascript:;">
          <span>用户管理</span>
        </a>

        <ul class="hide">
          <li>
            <a href="<?php echo framework\core\Factory::U('admin/user/index');?>
">
              <span>用户列表</span>
            </a>
          </li>
          <li>
            <a href="<?php echo framework\core\Factory::U('admin/user/role');?>
">
              <span>用户角色</span>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a data="icon" class="icon icon-setting" href="javascript:;">
          <span>全局设置</span>
        </a>

        <ul class="hide">
          <li>
            <a href="<?php echo framework\core\Factory::U('admin/topic');?>
">
              <span>站点信息</span>
            </a>
          </li>
          <li>
            <a href="<?php echo framework\core\Factory::U('admin/topic');?>
">
              <span>注册访问</span>
            </a>
          </li>
          <li>
            <a href="<?php echo framework\core\Factory::U('admin/topic');?>
">
              <span>邮件设置</span>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a data="icon" class=" icon icon-job" href="javascript:;">
          <span>工具</span>
        </a>

        <ul class="hide">
          <li>
            <a href="tool.html">
              <span>系统维护</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="ps-scrollbar-x-rail" style="width: 235px; display: none; left: 0px; bottom: 3px;">
    <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
  </div>
  <div class="ps-scrollbar-y-rail" style="top: 0px; height: 607px; display: inherit; right: 0px;">
    <div class="ps-scrollbar-y" style="top: 0px; height: 560px;"></div>
  </div>
</div>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_29450589739d0900c76_36210884',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<div class="aw-footer">
  <p>
    Copyright &copy; 2016-2099 - Powered By
    <a target="blank" href="http://helloitbull.net/">有问必答 1.0</a>
  </p>
</div>

</body>
</html><?php }
/* {block 'content'}  file:common.html */
function block_29450589739d0900c76_36210884($_smarty_tpl, $_blockParentStack) {
?>

<?php
}
/* {/block 'content'} */
}
