<?php
namespace admin\model;
use framework\core\Model;

class CategoryModel extends Model 
{
	protected $table_name = 'ask_category';
	
	//验证数据的合法性
	public function checkData($data)
	{
		//插入到数据表之前验证一下数据
		//var_dump($data);
		if($data['cat_name']===''){
			//保存错误信息，便于给用户提示
			$this -> error[] = '分类标题不能为空';
		}else if($this->isExistCategory($data['cat_name'],$data['parent_id'])){
			//判断创建的分类是否在父类里面已经存在了
			$this -> error[] = '同一个分类下面不能创建相同的子类';
		}		
		if(!empty($this->error)){
			//只要有错误信息则停止
			return false;
		}else{
			return true;
		}
	}
	//插入分类信息
	public function insertCategory($data)
	{
		return $this -> insert($data);
	}
	//判断某个分类下面是否已经存在当前这个分类了
	public function isExistCategory($cat_name,$p_id)
	{
		//因为这里我们的目的仅仅是判断父类下面有没有某个子类,而不是返回这个字段的值
		$sql = "SELECT 1 FROM $this->true_table WHERE cat_name='$cat_name' and parent_id=$p_id";
		return $this->dao->getOne($sql);
	}
	//查询分类列表
	public function getCategory()
	{
		//没有封装查询所有信息的sql语句，所以自己拼接sql
		$sql = "SELECT * FROM $this->true_table";
		$cat_list = $this -> dao -> getAll($sql);
		
		//再从该数组中递归查询，通过递归查询给每个层级上定义输出空格的个数
		$result = $this -> getChildCategory($cat_list);
		//var_dump($result);
		return $result;
	}
	
	//根据主键获得分类的图标
	public function getCatLogo($cat_id)
	{
		return $this -> find($cat_id,array('cat_logo'));
	}
	//删除时的验证，验证删除的分类是否是最终(叶子)的分类
	public function isFinalCategory($cat_id)
	{
		//数据库查询该分类下面是否还有子类
		$sql = "SELECT 1 FROM $this->true_table WHERE parent_id=$cat_id";
		$result = $this -> dao -> getOne($sql);
		//true，说明还有子类   false，是终端分类
		return !(bool)$result;
	}
	//递归查询分类信息，并生成有层级关系的格式的数组
	public function getChildCategory($cat_list,$p_id=0,$level=0)
	{
		static $arr = array();
		foreach($cat_list as $row){
			//获得当前的分类信息
			if($row['parent_id']==$p_id){
				//说明当前这条记录属于0的子类
				$row['level'] = $level;
				$arr[] = $row;
				//再次查询当前分类下面还有没有子类
				//每递归一次，让层级(空格个数+1)
				$this -> getChildCategory($cat_list,$row['cat_id'],$level+1);
			}
		}
		return $arr;
	}
	//删除分类
	public function deleteCategory($cat_id)
	{
		if($this->isFinalCategory($cat_id)){
			return $this -> delete($cat_id);
		}else{
			$this -> error[] = '下面还有小弟呢，不能删除...';
			return false;
		}
	}
	//根据cat_id查询分类信息
	public function getById($cat_id)
	{
		return $this -> find($cat_id);
	}
	
	//更新分类
	public function updateCategory($data)
	{		
		return $this -> update($data);		
	}
}