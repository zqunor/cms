<?php
namespace framework\tools;
class HttpRequest
{
	//是否返回数据
	private static $isreturn = true;	
	//提供一个将来在类的外面修改return的方法
	public function __set($attr,$value)
	{
		//当我们在类的外面访问了私有的  或者 不存在的属性的时候
		//自动调用__set魔术方法
		//var_dump($attr);
		//var_dump($value);
		$this->$attr = $value;
	}
	//发送http请求的功能
	public static function send($url,$data=null)
	{
		$curl = curl_init();
		//设置请求的url地址
		curl_setopt($curl,CURLOPT_URL,$url);
		
		//直接跳过安全证书的验证
		curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
		
		//根据$data判断，如果$data是空，说明从url中获取资源,否则向url文件中提交数据
		if(!empty($data)){
			curl_setopt($curl,CURLOPT_POST,true);
			curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
		}			
		//判断是否返回数据
		if(self::$isreturn){
			//将数据返回而不是直接输出
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
			$result = curl_exec($curl);
			return $result;
		}else{
			curl_exec($curl);
		}
		curl_close($curl);
	}
}