<?php

class View {
	
	private $t;
	private $content;
	static $request;
	private $error;
	private $debug;
	
	/**
	 * Merges $_GET _POST $_SESSION into the return
	 * @return array - merged requests
	 */	
	static public function request() {
		self::$request = array_merge($_GET, $_POST, $_SESSION);
		return self::$request;
	}
	
	
	public function __construct() {
		$this->error = false;
	}
	
	public function erroroff(){
		$this->error = false;
	}
	
	public function error($bool) {
		$this->error = $bool;
	}
	
	public function header() {
		$this->loadraw('header');
	}
	
	public function footer() {
		$this->loadraw('footer');
	}
	
	public function navigation() {
		$this->loadraw('navigation');
	}
	
	public function printForm($form){
		
	}
	
	public function contentStart(){
		echo "<div id='content'>";
	}
	
	public function contentEnd(){
		echo "</div>";
	}
	
	public function load($template, $params=false) {
		// scandir shit...
		
		require_once('View/templates/master/'.$template.'.php');
		
		$this->erroroff();
	}
	

	public function loadraw($template) {
		// scandir shit...
		require_once('View/templates/master/'.$template.'.php');
	}
	
}
