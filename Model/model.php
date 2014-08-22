<?php

require_once('Model/dbmysql/dbmysql.php');

class Model {
	
	
	private $dbuser;
	private $dbpass;
	private $dbserver;
	private $db;
	
	/**
	 * 
	 */
	public function __construct() {
	}
	

	
	/**
	 * @param $dbengine Datenbank typ (mysql, pgsql, csv)
	 * @param $dbinfos 
	 * Array mysql (username=>$username, password=>$password, host=>$host, db=>$db)
	 */
	public function setDBEngine($dbengine, $dbinfos) {
		
		switch ($dbengine){
			case 'mysql':
				if (isset($dbinfos['username']) && isset($dbinfos['password']) && isset($dbinfos['host']) && isset($dbinfos['db'])){
					$this->db = new dbmysql($dbinfos['username'], $dbinfos['password'], $dbinfos['host'], $dbinfos['db']);
					return true;
				}
				else {
					throw new Exception($dbinfos.' wurde nicht richtig gesetzt', 1);
					return false;
				}
				
			break;
			
			default:
				$return = false;
			break;
		}
			
		if ($return) {
			
		}
	}
	
	
	
}
