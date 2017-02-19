<?php
namespace framework\core;
class Factory
{
	public static function M($model_name)
	{
		if(substr($model_name,-5)!='Model' ){
			$model_name .='Model';
		}
		static $model_list = array();
		if(!isset($model_list[$model_name])){
			//这里无非就是当前模块或者其他模型  Category   admin\model\Category
			if(basename($model_name)===$model_name){
				//说明当前模块的模型类
				$model_name = MODULE."\\model\\".$model_name;
			}			
			$model_list[$model_name] = new $model_name;  //GoodsModel
		}
		return $model_list[$model_name];
	}

	/*
	 * U()专门用来生成伪静态的绝对地址
	 * @param $dispatch 传递模块、控制器、方法的名字
	 * @param $params 额外的参数,*/
	public static function U($dispatch,$params=array())
	{
		//将来这样调用: U('home/question/index',array('page'=>6);
		// /0909/home/question/index => /0909/index.php
		//$_SERVER['SCRIPT_NAME']: 获得当前这个脚本的绝对路径
		//var_dump($_SERVER['SCRIPT_NAME']); //=> /0909/index.php
		$url = str_replace('index.php','',$_SERVER['SCRIPT_NAME']);//=> /0909/

		$url .= $dispatch;

		foreach ( $params as $k=>$v ) {
			$url .= '/'.$k.'/'.$v;
		}

		return $url;
	}
}