<?php
namespace admin\controller;
use framework\core\Controller;
use framework\core\Factory;
use framework\tools\Upload;
use framework\tools\Image;

/*
 * 后台分类管理
 */

class CategoryController extends Controller {
  /*
   * 展示分类页面
   */
  public function index() {
    //查询所有的分类信息
    $model = Factory::M('CategoryModel');
    $cat_list = $model->getCategory();

    $this->smarty->assign('cat_list' , $cat_list);
    $this->smarty->display('category/index.html');
  }

  /*
   * 展示添加内容的表单页面
   */
  public function add() {
    //命令模型查询数据库有哪些分类信息
    $model = Factory::M('CategoryModel');
    $cat_list = $model->getCategory();

    $this->smarty->assign('cat_tree' , $cat_list);
    $this->smarty->display('category/add.html');
  }

  /*
   * 接收提交的数据并保存到数据库
   */
  public function addHandle() {
    //先验证数据的合法性
    $model = Factory::M('CategoryModel');
    $data['cat_name'] = $_POST['title'];
    $data['parent_id'] = $_POST['parent_id'];
    $result = $model->checkData($data);
    //如果数据合法，再上传图像、添加到数据库
    if ($result) {
      //选择上传的图像
      if ($_FILES['cat_logo']['error'] === 0) {
        //先上传图片
        $upload = new Upload();
        //设置上传的目录,通常将上传的文件保存到uploads目录
        $upload->setUploadPath(UPLOAD_PATH . 'category/');
        //开始上传
        $path = $upload->doUpload($_FILES['cat_logo']);


        //开始对刚刚上传的这个图像压缩处理
        $thumb = new Image('./app/public/uploads/category/' . $path);
        $thumb->setThumbPath('./app/public/static/thumb/');
        $thumb_path = $thumb->makeThumb(50 , 50);

        //将压缩的图像保存到数据表
        $data['cat_logo'] = isset($thumb_path) ? $thumb_path : '';
      }
      //再将分类的信息保存到数据库
      $model->insertCategory($data);
      $this->jumpNow(Factory::U('admin/category/index'));
    } else {
      //数据不合法，直接跳转回去
      $this->jumpWait('添加分类出错了，详细信息如下:<br>' . $model->getError() , Factory::U('admin/category/add'));
    }
  }

  /*
   * 显示编辑内容时的表单页面
   */
  public function edit() {
    //接收分类的id
    $cat_id = $_GET['id'];
    //查询当前分类的信息，并分配到视图中
    $model = Factory::M('CategoryModel');
    //修改的当前分类信息
    $cat_info = $model->getById($cat_id);

    //查询所有分类信息
    $cat_list = $model->getCategory();
    $this->smarty->assign('cat_list' , $cat_list);
    $this->smarty->assign('cat_info' , $cat_info);
    $this->smarty->display('category/edit.html');
  }

  /*
   * 接收提交的内容，执行更新操作
   */
  public function update() {
    //var_dump($_POST);
    //先验证修改的新的分类信息的合法性
    $model = Factory::M('CategoryModel');
    //验证分类的标题不能为空
    if ($_POST['cat_name'] !== '') {
      //执行更新
      //判断是否上传了新的图标
      if ($_FILES['cat_logo']['error'] === 0) {
        //上传了新的图标
        //删除旧的图标，使用新的
        //@unlink(UPLOAD_PATH . 'category/' . $_POST['old_cat_logo']);
        //再上传新的图标
        //先上传图片
        $upload = new Upload();
        $upload->setPrefix('ask_');
        //设置上传的目录,通常将上传的文件保存到uploads目录
        $upload_path =UPLOAD_PATH . 'category/';
        $upload->setUploadPath($upload_path );
        //开始上传
        $path = $upload->doUpload($_FILES['cat_logo']);
        $thumb_path = $upload_path  .$path;

        $thumb = new Image($thumb_path);
        $thumb->setThumbPath($upload_path );
        $thumb_cat_logo ='category/'. $thumb->makeThumb(50 , 50);

        $data['cat_logo'] = isset($thumb_cat_logo) ? $thumb_cat_logo : '';
      } else {
        //没有上传
        $data['cat_logo'] = $_POST['old_cat_logo'];
      }
      $data['cat_id'] = $_POST['cat_id'];
      $data['cat_name'] = $_POST['cat_name'];
      $data['parent_id'] = $_POST['parent_id'];

      //执行更新的操作
      $res = $model->updateCategory($data);
      if ($res) {
        $this->jumpNow(Factory::U('admin/category/index'));
      }
    } else {
      //数据不合法
      $this->jumpWait('更新失败<br>' , Factory::U('admin/category/add' , array('id' => $_POST['cat_id'])));
    }
  }

  /*
   * 删除数据
   */
  public function delete() {
    //执行删除的操作
    //接收传递过来的分类id
    $cat_id = $_GET['id'];
    //根据分类的id查找到图片的地址
    $model = Factory::M('CategoryModel');
    $cat_logo = $model->getCatLogo($cat_id);

    //删除分类的图标
    //unlink('./app/public/uploads/category/'.$cat_logo['cat_logo']);
    //针对权限比较高的系统，可能删除不成功，@就是用来屏蔽错误
    @unlink(UPLOAD_PATH . 'category/' . $cat_logo['cat_logo']);
    //再删除数据库的信息
    $result = $model->deleteCategory($cat_id);
    if ($result) {
      $this->jumpNow(Factory::U('admin/category/index'));
    } else {
      $this->jumpWait('删除失败,详细信息如下:<br>' . $model->getError() , Factory::U('admin/category/index'));
    }
  }

}