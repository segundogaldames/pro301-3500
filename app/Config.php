<?php
//este archivo contiene configuraciones generales del sistema
define('BASE_URL','http://localhost:8080/pro301-3500/');
define('DEFAULT_CONTROLLER','index');
define('DEFAULT_LAYOUT','default');
define('APP_NAME','App_Noticias');

#define un hash para encriptar contraseñas
define('HASH_KEY','RFXuU62HVm02nK/72YacCavycwOoX1r4zo07b6lGBGytd+A7OosUeCFw6oB6FI2XmSDHn+gOCQglxnGhDZCe6g==');

#define un hash para validar contenido externo
define('HASH_CTRL','gEE8RlTArfvwEfrnMR8pfillig/J0eRQYuiqSVN4GaqbHO5sVnH8HHIwrUizOj+9sUx3Z8JEgcsG9Xeq+evPAQ==');
define('METHOD_ENCRYPT','AES-256-ECB');
define('KEY','Noticias_APP');

#credenciales de acceso a BD
define('DB_DRIVER','mysql');
define('DB_HOST','localhost');#127.0.0.1
define('DB_USER','root');
define('DB_PASS','1234');
define('DB_NAME','');
define('DB_CHAR','utf8');