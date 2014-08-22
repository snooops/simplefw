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
$v->header();
$v->navigation();

$dataid = 1;

// get whole inventory
$params['list'] = $m->getAssets($dataid);
		
// get all kind of data
$params['data_name'] = $m->getAssetData();

$v->contentStart();

$params['dataid'] = $dataid;

// print whole inventory
$v->load('listAssets', $params);

$v->contentEnd();

$v->footer();