<?php
namespace framework\dao;
interface I_DAO
{
	//查询所有数据的功能
	public function getAll($sql='');
//	//查询一条数据
	public function getRow($sql='');
//	//查询一个字段的值
	public function getOne($sql='');
//	//执行增删改的功能
	public function exec($sql='');
//	(查询的时候，返回的结果数)
	public function resultRows();
//	//查询执行插入操作返回的主键的值
	public function lastInsertId();
//	//
	public function query($sql='');
//	//转义引号、并包裹的
	public function escapeData($data='');
}