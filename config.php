<?php

// Always provide a TRAILING SLASH (/) AFTER A PATH
if ($_SERVER['HTTP_HOST'] == "localhost") 
{
	define('URL', 'http://localhost/pico/');

	define('DB_HOST', 'localhost');
	define('DB_NAME', 'pico_lanches');
	define('DB_USER', 'root');
	define('DB_PASS', '');
}
else 
{
	define('URL', 'http://www.picolanches.com.br/');

	define('DB_HOST', 'cpmy0125.servidorwebfacil.com');
	define('DB_NAME', 'nepali_pico');
	define('DB_USER', 'nepali_picouser');
	define('DB_PASS', 'Inicial@123');
}
	
define('LIBS', 'libs/');

define('DB_TYPE', 'mysql');

//Nome do sistema
define('SYSTEM_NAME','PICO Lanches');

define('PREFIX_SESSION', 'pico_');
?>