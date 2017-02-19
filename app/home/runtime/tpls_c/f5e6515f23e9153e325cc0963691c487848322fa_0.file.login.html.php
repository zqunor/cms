<?php
/* Smarty version 3.1.29, created on 2017-01-15 12:29:35
  from "F:\Service\wamp64\www\cms\app\home\view\user\login.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_587afaaf7128d0_18101918',
  'file_dependency' => 
  array (
    'f5e6515f23e9153e325cc0963691c487848322fa' => 
    array (
      0 => 'F:\\Service\\wamp64\\www\\cms\\app\\home\\view\\user\\login.html',
      1 => 1483877145,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:user/common.html' => 1,
  ),
),false)) {
function content_587afaaf7128d0_18101918 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'title', array (
  0 => 'block_4244587afaaf6b36f0_41256125',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "wrapper", array (
  0 => 'block_22333587afaaf6bf357_45064740',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:user/common.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'title'}  file:user/login.html */
function block_4244587afaaf6b36f0_41256125($_smarty_tpl, $_blockParentStack) {
?>
登录<?php
}
/* {/block 'title'} */
/* {block 'wrapper'}  file:user/login.html */
function block_22333587afaaf6bf357_45064740($_smarty_tpl, $_blockParentStack) {
?>


<div id="wrapper">
  <div class="aw-login-box">
    <div class="mod-body clearfix">
      <div class="content pull-left">
        <h1 class="logo">
          <a href=""></a>
        </h1>
        <h2>有问必答</h2>
        <form action="<?php echo framework\core\Factory::U('home/user/doLogin');?>
" method="post" id="login_form">
          <ul>
            <li>
              <input type="text" name="user_name" placeholder="邮箱 / 用户名" class="form-control" id="aw-login-user-name">
            </li>
            <li>
              <input type="password" name="password" placeholder="密码" class="form-control" id="aw-login-user-password">
            </li>
            <li class="alert alert-danger hide error_message"><i class="icon icon-delete"></i> <em></em>
            </li>
            <li class="last">
              <input type="submit" value="登录" class="pull-right btn btn-large btn-primary" id="login_submit">
              <label>
                <input type="checkbox" name="net_auto_login" value="1">记住我</label>
              <a href="">&nbsp;&nbsp;忘记密码</a>
            </li>
          </ul>
        </form>
      </div>
      <div class="side-bar pull-left"></div>
    </div>
    <div class="mod-footer">
      <span>还没有账号?</span>
      &nbsp;&nbsp;
      <a href="<?php echo framework\core\Factory::U('home/user/doLogin');?>
">立即注册</a>
      &nbsp;&nbsp;•&nbsp;&nbsp;
      <a href="<?php echo framework\core\Factory::U('home/index/index');?>
">游客访问</a>
    </div>
  </div>
</div>
<?php
}
/* {/block 'wrapper'} */
}
