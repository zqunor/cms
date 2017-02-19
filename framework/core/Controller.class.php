<?php
namespace framework\core;
use \Smarty;
/*
 * 基础控制器，封装了控制器之间的公共操作
 */
class Controller
{
	protected $smarty;
	public function __construct()
	{
		$this -> initContentType();
		$this -> initSmarty();
		//初始化时区
		$this -> initTimezone();
		//初始化session，session_start
		$this -> initSession();

		
	}
	//防跳墙的验证操作
	protected function isLogin()
	{
		//验证是否登录
		if(!isset($_SESSION['user'])){
			//判断是否保存了上次登录成功的状态
			if(isset($_COOKIE['uname'])){
				
				//有cookie，说明保存上次登录成功的状态了
				//再判断7天之内有没有修改密码
				//1. 根据用户名去数据库查询一下密码
				$m_user = Factory::M('UserModel');
				$user = $m_user -> getByName($_COOKIE['uname']);
				$pass = $user['password'];
				
				if($pass == $_COOKIE['pass']){
					//用户名、密码正确
					//将用户的信息在session中保存起来，便于多个页面中共用
					$_SESSION['user'] = $user;					
				}else{
					$this -> jumpWait('密码已过期',Factory::U('home/user/login'));
				}
			}else{
				//没有session也没有cookie
				$this -> jumpWait('请先登录',Factory::U('home/user/login'));
			}
		}
	}
	//开启session
	private function initSession()
	{
		session_start();
	}
	//初始化时区
	private function initTimezone()
	{
		date_default_timezone_set('PRC');
	}
	private function initContentType()
	{
		header("Content-Type:text/html;charset=utf-8");		
	}
	private function initSmarty()
	{
		$this->smarty = new Smarty();

		$this->smarty->left_delimiter = '<{';
		$this->smarty->right_delimiter = '}>';
		
		$this->smarty->setTemplateDir('./app/'.MODULE.'/view/');
		
		$this->smarty->setCompileDir('./app/'.MODULE.'/runtime/tpls_c/');
	}
	//成功的跳转方法
	protected function jumpNow($url)
	{
		header("Location:$url");
		die;
	}
	
	//失败的跳转方法
	protected function jumpWait($err_message,$url,$wait=1)
	{
		echo $err_message;
		header("Refresh:$wait;URL=$url");
		die;
	}
}