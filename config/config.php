<?php



define('CONF_TEMPLATE', 		"master");


if (stripos(getcwd(), "-dev.com")) {

	define('DB_USERNAME',			"openinventory");
	define('DB_PASSWORD', 			"Pr2f8rAAEZ6sqnbx");
	define('DB_DATABASE', 			"openinventory_dev");
	define('DB_SERVER', 			"10.10.5.102");
	
	define('INV_STARTNUMBER', 		2000);
	define('INV_PREFIX', 			'PC');

}

else {
	define('DB_USERNAME',			"openinventory");
	define('DB_PASSWORD', 			"Pr2f8rAAEZ6sqnbx");
	define('DB_DATABASE', 			"openinventory");
	define('DB_SERVER', 			"10.10.5.102");
	
	define('INV_STARTNUMBER', 		2000);
	define('INV_PREFIX', 			'PC');
}
