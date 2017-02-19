<?php
/* Smarty version 3.1.29, created on 2017-01-09 10:09:34
  from "F:\Service\wamp64\www\cms\app\home\view\question\add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5872f0dea5b3f4_54562185',
  'file_dependency' => 
  array (
    '1eeaad585e8c1e04f6bc6e548001744d062915a0' => 
    array (
      0 => 'F:\\Service\\wamp64\\www\\cms\\app\\home\\view\\question\\add.html',
      1 => 1483927555,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/common.html' => 1,
  ),
),false)) {
function content_5872f0dea5b3f4_54562185 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'title', array (
  0 => 'block_217525872f0de9f9489_74014868',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_281135872f0dea02f96_19410620',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:common/common.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'title'}  file:question/add.html */
function block_217525872f0de9f9489_74014868($_smarty_tpl, $_blockParentStack) {
?>
发起问题 - <?php
}
/* {/block 'title'} */
/* {block 'content'}  file:question/add.html */
function block_281135872f0dea02f96_19410620($_smarty_tpl, $_blockParentStack) {
?>


<div class="aw-container-wrap">
	<div class="container aw-publish">
		<div class="row">
			<div class="aw-content-wrap clearfix">
				<div class="col-sm-12 col-md-9 aw-main-content">
					<!-- tab 切换 -->
					<ul class="nav nav-tabs aw-nav-tabs active">
																								<li><a href="http://localhost/wecenter/?/publish/article/">文章</a></li>
						<li class="active"><a href="http://localhost/wecenter/?/publish/">问题</a></li>
						<h2 class="hidden-xs"><i class="icon icon-ask"></i> 发起</h2>
					</ul>
					<!-- end tab 切换 -->
					<form id="question_form" method="post" 
					action="<?php echo framework\core\Factory::U('home/question/addHandle');?>
">
						<div class="aw-mod aw-mod-publish">
							<div class="mod-body">
								<h3>问题标题:</h3>
								<!-- 问题标题 -->
								<div class="aw-publish-title">
									<input type="text" value="" id="question_contents" name="question_title" placeholder="问题标题...">
									<select style="float:right" id="category_id" name="cat_id">
											<option value="0">- 顶级分类 -</option>
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
												<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['cat_id'];?>
">
													<?php echo preg_replace('!^!m',str_repeat("&nbsp;&nbsp;&nbsp;",$_smarty_tpl->tpl_vars['row']->value['level']),$_smarty_tpl->tpl_vars['row']->value['cat_name']);?>

												</option>
											<?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
?>
									</select>									
								</div>
								<!-- end 问题标题 -->
								<h3>问题补充 (选填):</h3>
								<div class="aw-mod http://localhost/0909/index.php/home/question/detail/id/20">
									<textarea rows="8" cols="90" name="question_desc"></textarea>									
								</div>
								<h3>添加话题:</h3>
								<div class="aw-topic-bar">
									<div class="topic-bar clearfix">
										<?php
$_from = $_smarty_tpl->tpl_vars['topic_list']->value;
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
										<span class="topic-tag">
											<input type="checkbox" name="topic_id[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['topic_id'];?>
"/>
											<?php echo $_smarty_tpl->tpl_vars['row']->value['topic_title'];?>

										</span>
										<?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_1_saved_local_item;
}
if ($__foreach_row_1_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_1_saved_item;
}
?>						
									</div>
								</div>
																															</div>
							<div class="mod-footer clearfix">
								<span class="aw-anonymity">
																											<label><input type="checkbox" name="anonymous" value="1" class="pull-left">
										匿名</label>

								</span>
								<input type="submit" id="publish_submit" class="btn btn-large btn-success btn-publish-submit" value="确认发起">
							</div>
						</div>
					</form>
				</div>
				<!-- 侧边栏 -->
				<div class="col-sm-12 col-md-3 aw-side-bar hidden-xs">
					<!-- 问题发起指南 -->
					<div class="aw-mod publish-help">
						<div class="mod-head">
							<h3>问题发起指南</h3>
						</div>
						<div class="mod-body">
							<p><b>• 问题标题:</b> 请用准确的语言描述您发布的问题思想</p>
							<p><b>• 问题补充:</b> 详细补充您的问题内容, 并提供一些相关的素材以供参与者更多的了解您所要问题的主题思想</p>
							<p><b>• 选择话题:</b> 选择一个或者多个合适的话题, 让您发布的问题得到更多有相同兴趣的人参与. 所有人可以在您发布问题之后添加和编辑该问题所属的话题</p>
													</div>
					</div>
					<!-- end 问题发起指南 -->
				</div>
				<!-- end 侧边栏 -->
			</div>
		</div>
	</div>
</div>
<?php
}
/* {/block 'content'} */
}
