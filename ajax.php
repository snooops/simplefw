<?php

require_once ("config/config.php");

require_once ("Model/model.php");

require_once ("View/view.php");

session_start();

$m = new Model;

$dbinfos = Array(
	'username'=>DB_USERNAME, 
	'password'=>DB_PASSWORD, 
	'host'=>DB_SERVER, 
	'db'=>DB_DATABASE	
	);


$m->setDBEngine('mysql', $dbinfos);

$v = new View;

$mod = $_POST['mod'];





switch ($mod) {	
	
	
	case 'delAsset':
		$id = $_POST['id'];
		
		$m->delAsset($id);
		
		// get whole inventory
		$params['list'] = $m->getAssets();
		
		// get all kind of data
		$params['data_name'] = $m->getAssetData();
		
		// print whole inventory
		$v->load('listAssets', $params);
	break;
	
	
	
	// something went wrong, give some debug information
	default:
		echo "Ooops! Im sorry, i can't handle this request:";
		var_dump($_POST);
	break;
}
