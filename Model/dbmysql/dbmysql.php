<?php


class dbmysql {
	
	private $c;
	private $host;
	private $user;
	private $password;
	private $db;
	private $insertId;
	
	
	public function __construct($user, $password, $host, $db) {
		$this->user = $user;
		$this->password = $password;
		$this->host =$host;
		$this->db = $db;
		
		if ($this->connect() === true) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * creates a connection to the database
	 */
	private function connect(){
		$this->c = new mysqli($this->host, $this->user, $this->password, $this->db);
		
		if ($this->c->connect_errno) {
			throw new Exception("MySQL connect not possible: ".$this->c->connect_error, 1);
			return false;
		} 
		else {
			return true;
		}
	}
	
	
	public function getInsertId(){
		return $this->c->insert_id;
	}

	private function setInsertId(){
		$this->insertId = $this->c->insert_id;
	}
	
	/**
	 * @param sql
	 * @return sql-return object
	 */	
	public function query($sql){
		$return = $this->c->query($sql);
		
		//$this->c->
		return $return;
	}


	/**
	 * @param string name of the procedure to call
	 * @param SELECT or INSERT
	 * @param array parameters as array: 0 => value, 1 => value etc.
	 * @return assoc array
	 */
	public function procedure($name, $direction, $params=FALSE ) {
		$return = false;	
		
		$paramstring = '(';
		
		if ($params != FALSE) {	
			$i = 0;
			foreach ($params as $key => $val) {
				$paramstring .= "'$val'";
				$i++;
				if ($i < sizeof($params)) {
					$paramstring .= ',';
				}
			}
			
			
			
		}
		$paramstring .= ' )';
		
		$result = $this->c->query('CALL '.$name . $paramstring);
		if (!$result) {
			throw new Exception('MySQL query not possible: '. $result->errno.' - '.$result->error. ' - '.$this->c->error .' - '.$paramstring.' ', 1);
		}
		
		switch ($direction) {
			case 'SELECT':
				$i=0;
				while ($res = $result->fetch_assoc()) {
					$return[$i] = $res;
					$i++;
				}
	
				$this->c->next_result();
				$result->free_result();
			break;
				
			case 'INSERT':
				$res = $result->fetch_assoc();
				$return = $res['@lastId'];
				
				
				$this->c->next_result();
				$result->free_result();
			break;
			
			case 'UPDATE':
				// nothing toDo YIPPIE!
			break;
			
			case 'DELETE':
				// nothing toDo YIPPIE!
			break;
		}
		
		return $return;
	}
}
