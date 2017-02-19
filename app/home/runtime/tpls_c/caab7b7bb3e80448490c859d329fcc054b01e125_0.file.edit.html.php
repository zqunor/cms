<?php
/* Smarty version 3.1.29, created on 2017-01-09 10:13:09
  from "F:\Service\wamp64\www\cms\app\home\view\user\edit.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5872f1b553d417_22744206',
  'file_dependency' => 
  array (
    'caab7b7bb3e80448490c859d329fcc054b01e125' => 
    array (
      0 => 'F:\\Service\\wamp64\\www\\cms\\app\\home\\view\\user\\edit.html',
      1 => 1483927555,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/common.html' => 1,
  ),
),false)) {
function content_5872f1b553d417_22744206 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'title', array (
  0 => 'block_228705872f1b549c7a9_15451971',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "cssjs", array (
  0 => 'block_281195872f1b54a6838_97328514',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "content", array (
  0 => 'block_304045872f1b54b5a35_46159464',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:common/common.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'title'}  file:user/edit.html */
function block_228705872f1b549c7a9_15451971($_smarty_tpl, $_blockParentStack) {
?>
用户设置 - <?php
}
/* {/block 'title'} */
/* {block 'cssjs'}  file:user/edit.html */
function block_281195872f1b54a6838_97328514($_smarty_tpl, $_blockParentStack) {
?>

<link type="text/css" rel="stylesheet" href="<?php echo PUBLIC_HOME;?>
css/user_setting.css">
<?php
}
/* {/block 'cssjs'} */
/* {block 'content'}  file:user/edit.html */
function block_304045872f1b54b5a35_46159464($_smarty_tpl, $_blockParentStack) {
?>

<div class="aw-container-wrap">
  <div class="container">
    <div class="row">
      <div class="aw-content-wrap clearfix">
        <div class="aw-user-setting">
          <!--用户设置-->
          <div class="tabbable">
            <ul class="nav nav-tabs aw-nav-tabs active">

              <h2><i class="icon icon-setting"></i> 用户设置</h2>
            </ul>
          </div>

          <div class="tab-content clearfix">
            <!-- 基本信息 -->
            <div class="aw-mod">
              <div class="mod-body">
                <div class="aw-mod mod-base">
                  <div class="mod-head">
                    <h3>基本信息</h3>
                  </div>
                  <form id="setting_form" method="post" action="<?php echo framework\core\Factory::U('home/user/editHandle');?>
">
                  <div class="mod-body ">
                    <!--账号-->
                    <dl>
                      <dt>账号:</dt>
                      <dd><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>

                        <?php if ($_smarty_tpl->tpl_vars['user']->value['is_active'] == 0) {?>&nbsp;
                        (<a onclick="AWS.ajax_request(G_BASE_URL + '/account/ajax/send_valid_mail/');">重发验证邮件</a>)
                        <?php }?>
                      </dd>
                    </dl>
                    <!--真实姓名-->
                    <dl>
                      <dt>真实姓名:</dt>
                      <dd><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</dd>
                    </dl>
                    <!--性别-->
                    <dl>
                      <dt>性别:</dt>
                      <dd>
                        <label>
                          <input name="sex" id="sex" value="1" type="radio"/> 男 </label>
                        <label>
                          <input name="sex" id="sex" value="2" type="radio"/> 女 </label>
                        <label>
                          <input name="sex" id="sex" value="3" type="radio" checked="checked"/> 保密 </label>
                      </dd>
                    </dl>
                    <!--生日-->
                    <dl>
                      <dt>生日:</dt>
                      <dd>
                        <select name="birthday_y">
                          <option value=""></option>
                          <option value="2016">2016</option>
                          <option value="2015">2015</option>
                          <option value="2014">2014</option>
                          <option value="2013">2013</option>
                          <option value="2012">2012</option>
                          <option value="2011">2011</option>
                          <option value="2010">2010</option>
                          <option value="2009">2009</option>
                          <option value="2008">2008</option>
                          <option value="2007">2007</option>
                          <option value="2006">2006</option>
                          <option value="2005">2005</option>
                          <option value="2004">2004</option>
                          <option value="2003">2003</option>
                          <option value="2002">2002</option>
                          <option value="2001">2001</option>
                          <option value="2000">2000</option>
                          <option value="1999">1999</option>
                          <option value="1998">1998</option>
                          <option value="1997">1997</option>
                          <option value="1996">1996</option>
                          <option value="1995">1995</option>
                          <option value="1994">1994</option>
                          <option value="1993">1993</option>
                          <option value="1992">1992</option>
                          <option value="1991">1991</option>
                          <option value="1990">1990</option>
                          <option value="1989">1989</option>
                          <option value="1988">1988</option>
                          <option value="1987">1987</option>
                          <option value="1986">1986</option>
                          <option value="1985">1985</option>
                          <option value="1984">1984</option>
                          <option value="1983">1983</option>
                          <option value="1982">1982</option>
                          <option value="1981">1981</option>
                          <option value="1980">1980</option>
                          <option value="1979">1979</option>
                          <option value="1978">1978</option>
                          <option value="1977">1977</option>
                          <option value="1976">1976</option>
                          <option value="1975">1975</option>
                          <option value="1974">1974</option>
                          <option value="1973">1973</option>
                          <option value="1972">1972</option>
                          <option value="1971">1971</option>
                          <option value="1970" selected>1970</option>
                          <option value="1969">1969</option>
                          <option value="1968">1968</option>
                          <option value="1967">1967</option>
                          <option value="1966">1966</option>
                          <option value="1965">1965</option>
                          <option value="1964">1964</option>
                          <option value="1963">1963</option>
                          <option value="1962">1962</option>
                          <option value="1961">1961</option>
                          <option value="1960">1960</option>
                          <option value="1959">1959</option>
                          <option value="1958">1958</option>
                          <option value="1957">1957</option>
                          <option value="1956">1956</option>
                          <option value="1955">1955</option>
                          <option value="1954">1954</option>
                          <option value="1953">1953</option>
                          <option value="1952">1952</option>
                          <option value="1951">1951</option>
                          <option value="1950">1950</option>
                          <option value="1949">1949</option>
                          <option value="1948">1948</option>
                          <option value="1947">1947</option>
                          <option value="1946">1946</option>
                          <option value="1945">1945</option>
                          <option value="1944">1944</option>
                          <option value="1943">1943</option>
                          <option value="1942">1942</option>
                          <option value="1941">1941</option>
                          <option value="1940">1940</option>
                          <option value="1939">1939</option>
                          <option value="1938">1938</option>
                          <option value="1937">1937</option>
                          <option value="1936">1936</option>
                          <option value="1935">1935</option>
                          <option value="1934">1934</option>
                          <option value="1933">1933</option>
                          <option value="1932">1932</option>
                          <option value="1931">1931</option>
                          <option value="1930">1930</option>
                          <option value="1929">1929</option>
                          <option value="1928">1928</option>
                          <option value="1927">1927</option>
                          <option value="1926">1926</option>
                          <option value="1925">1925</option>
                          <option value="1924">1924</option>
                          <option value="1923">1923</option>
                          <option value="1922">1922</option>
                          <option value="1921">1921</option>
                          <option value="1920">1920</option>
                          <option value="1919">1919</option>
                          <option value="1918">1918</option>
                          <option value="1917">1917</option>
                          <option value="1916">1916</option>
                          <option value="1915">1915</option>
                          <option value="1914">1914</option>
                          <option value="1913">1913</option>
                          <option value="1912">1912</option>
                          <option value="1911">1911</option>
                          <option value="1910">1910</option>
                          <option value="1909">1909</option>
                          <option value="1908">1908</option>
                          <option value="1907">1907</option>
                          <option value="1906">1906</option>
                          <option value="1905">1905</option>
                          <option value="1904">1904</option>
                          <option value="1903">1903</option>
                          <option value="1902">1902</option>
                          <option value="1901">1901</option>
                        </select>
                        年 <select name="birthday_m">
                        <option value=""></option>
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                      </select>
                        月 <select name="birthday_d">
                        <option value=""></option>
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                      </select>
                        日
                      </dd>
                    </dl>
                    <!--居住地-->
                    <dl>
                      <dt><label>现居:</label></dt>
                      <dd>
                        <select style="display:inline-block" class="select_area" name="province">
                          <option value="">请选择省份或直辖市</option>
                          <option value="安徽省">安徽省</option>
                          <option value="北京市">北京市</option>
                          <option value="福建省">福建省</option>
                          <option value="甘肃省">甘肃省</option>
                          <option value="广东省">广东省</option>
                          <option value="广西壮族自治区">广西壮族自治区</option>
                          <option value="贵州省">贵州省</option>
                          <option value="海南省">海南省</option>
                          <option value="河北省">河北省</option>
                          <option value="河南省">河南省</option>
                          <option value="黑龙江省">黑龙江省</option>
                          <option value="湖北省">湖北省</option>
                          <option value="湖南省">湖南省</option>
                          <option value="吉林省">吉林省</option>
                          <option value="江苏省">江苏省</option>
                          <option value="江西省">江西省</option>
                          <option value="辽宁省">辽宁省</option>
                          <option value="内蒙古自治区">内蒙古自治区</option>
                          <option value="宁夏回族自治区">宁夏回族自治区</option>
                          <option value="青海省">青海省</option>
                          <option value="山东省">山东省</option>
                          <option value="山西省">山西省</option>
                          <option value="陕西省">陕西省</option>
                          <option value="上海市">上海市</option>
                          <option value="四川省">四川省</option>
                          <option value="天津市">天津市</option>
                          <option value="西藏自治区">西藏自治区</option>
                          <option value="新疆维吾尔自治区">新疆维吾尔自治区</option>
                          <option value="云南省">云南省</option>
                          <option value="浙江省">浙江省</option>
                          <option value="重庆市">重庆市</option>
                          <option value="香港">香港</option>
                          <option value="澳门">澳门</option>
                          <option value="台湾">台湾</option>
                        </select>

                        <select class="select_area" name="city"></select>
                      </dd>
                    </dl>
                    <!--职业-->
                    <dl>
                      <dt><label>职业:</label></dt>
                      <dd>
                        <select name="job_id">
                          <option value="0">--</option>
                          <option value="1">站长</option>
                          <option value="2">产品经理</option>
                          <option value="3">视觉设计师</option>
                          <option value="4">程序员</option>
                          <option value="5">前端工程师</option>
                          <option value="6">风险投资者</option>
                          <option value="7">职业经理人</option>
                          <option value="8">运营人员</option>
                          <option value="9">人力资源</option>
                          <option value="10">运维人员</option>
                          <option value="11">创业者</option>
                          <option value="12">媒体</option>
                          <option value="13">天使</option>
                          <option value="14">学生</option>
                          <option value="17">其他</option>
                        </select>
                      </dd>
                    </dl>
                    <!--个人简介-->
                    <dl>
                      <dt><label>介绍:</label></dt>
                      <dd class="introduce"><input class="form-control" name="signature" maxlength="128" type="text"
                          value=""/></dd>
                    </dl>

                    <form action="<?php echo framework\core\Factory::U('home/user/addThumb');?>
" enctype="multipart/form-data"
                        method="post">
                      <!-- 上传头像 -->
                      <div class="side-bar">
                        <dl>
                          <dt class="pull-left">
                            <!--<img class="aw-border-radius-5" src="<?php echo THUMB_PATH;
echo $_smarty_tpl->tpl_vars['user']->value['user_thumb'];?>
" alt="" id="avatar_src"/>-->
                          </dt>
                          <dd class="pull-left">
                            <h5>头像设置</h5>

                            <?php if ($_SESSION['user']['user_thumb']) {?>

                            <img class="aw-border-radius-5" src="<?php echo THUMB_PATH;
echo $_smarty_tpl->tpl_vars['user']->value['user_thumb'];?>
" alt="" id="avatar_src"/>
                            <span style="color:red">头像已上传,继续上传将覆盖</span>
                            <?php }?>

                            <input type="file" name="user_thumb">

                            <p>支持 jpg、jpeg、gif、png 等格式的图片</p>
                            <!--<a class="btn btn-mini btn-success" href="<?php echo framework\core\Factory::U('home/user/addThumb');?>
" id="avatar_uploader" href="javascript:;" >上传头像</a> -->
                            <input type="submit" class="btn btn-mini btn-success" id="avatar_uploader" value="上传头像">
                            <span id="avatar_uploading_status" class="collapse"><i class="aw-loading"></i> 文件上传中...</span>
                          </dd>
                        </dl>
                      </div>
                      <!-- end 上传头像 -->
                    </form>

                  </div>

                  <!-- end 基本信息 -->
                  <!--</form>-->

                </div>
                <div class="mod-footer clearfix">
                  <a href="javascript:;" class="btn btn-large btn-success pull-right"
                      onclick="AWS.ajax_post($('#setting_form'));">保存</a>
                </div>
              </div>

              <?php echo '<script'; ?>
 type="text/javascript">
              $(document).ready(function () {
              $('.select_area').LocationSelect({
              labels: ["请选择省份或直辖市", "请选择城市"],
              elements: document.getElementsByTagName("select"),
              detector: function () {
              this.select(["", ""]);
              },
              dataUrl: G_BASE_URL.replace('/?', '') + '/<?php echo PUBLIC_HOME;?>
js/areas.js'
              });

              var fileUpload = new FileUpload('avatar', $('#avatar_uploader'), $('#avatar_src'), G_BASE_URL + '/account/ajax/avatar_upload/', {'loading_status': '#avatar_uploading_status'});
              });


              <?php echo '</script'; ?>
>

              <?php echo '<script'; ?>
 type="text/javascript" src="/<?php echo PUBLIC_HOME;?>
js/app/setting.js"><?php echo '</script'; ?>
>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <a class="aw-back-top hidden-xs" href="javascript:;" onclick="$.scrollTo(1, 600, {queue:true});"><i
      class="icon icon-up"></i></a>

  <?php echo '<script'; ?>
 type="text/javascript">
      var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
      document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F6d30c149d6f00fa3f34dc482f264a080' type='text/javascript'%3E%3C/script%3E"));
  <?php echo '</script'; ?>
>

  <?php echo '<script'; ?>
 type="text/javascript" src="https://dn-bughd-web.qbox.me/bughd.min.js" crossOrigin="anonymous"><?php echo '</script'; ?>
>

  <?php echo '<script'; ?>
 type="text/javascript">
      window.bughd = window.bughd || function () {
          };
      bughd("create", {key: "d96d072cefc5ab3c6256af43ec8859bc"})
  <?php echo '</script'; ?>
>

  <!-- DO NOT REMOVE -->
  <div id="aw-ajax-box" class="aw-ajax-box"></div>

  <div style="display:none;" id="__crond">
    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            $('#__crond').html(unescape('%3Cimg%20src%3D%22' + G_BASE_URL + '/crond/run/1468798097%22%20width%3D%221%22%20height%3D%221%22%20/%3E'));
        });
    <?php echo '</script'; ?>
>
  </div>

  <!-- Escape time: 0.034345865249634 --><!-- / DO NOT REMOVE -->
</div>
<?php
}
/* {/block 'content'} */
}
