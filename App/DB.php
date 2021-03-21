<?php

namespace Mango;

class DB {
	public static $con = null;

	public static function getDB()
	{
		if(self::$con == null) {
			
			$db_host = "ls-71d8d2dedfb8b45c5188d27f27dc496bafae37b5.c6eaoetjq6bp.us-east-1.rds.amazonaws.com";
			$db_user = "dbmasteruser";
			$db_password = "dbmasteruser1234";
			$db_name = "mangotunes";
			try{
				self::$con = new \PDO("mysql:host=ls-71d8d2dedfb8b45c5188d27f27dc496bafae37b5.c6eaoetjq6bp.us-east-1.rds.amazonaws.com;dbname=mangotunes;charset=utf8mb4", $db_user, $db_password);
				self::$con->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
				self::$con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			}catch(Exception $e){
				echo $e->getMessage();
			}

		}

		return self::$con;
	}

	public static function fetchAll($sql, $param=[])
	{
		$con = self::getDB();
		$q = $con->prepare($sql);
		$q->execute($param);
		return $q->fetchAll(\PDO::FETCH_OBJ);
	}

	public static function fetch($sql, $param = [])
	{
		$con = self::getDB();
		$q = $con->prepare($sql);
		$q->execute($param);
		return $q->fetch(\PDO::FETCH_OBJ);
	}

	public static function query($sql, $param = [])
	{
		$con = self::getDB();
		$q = $con->prepare($sql);
		return $q->execute($param);
	}

	public static function msgAndGo($msg, $link)
	{
		echo "<script>";
		echo "alert('$msg');";
		echo "location.href = '$link';";
		echo "</script>";
	}

	public static function msgAndBack($msg)
	{
		echo "<script>";
		echo "alert('$msg');";
		echo "history.back();";
		echo "</script>";
	}

	public static function lastId()
	{
		$con = self::getDB();
		return $con->lastInsertId();
	}
}