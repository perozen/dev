<?php

try {
	 $access=new pdo("mysql:host=localhost;dbname=dbname;charset=utf8", "username", "password");
     
     $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (Exception $e) 
{
	$e->getMessage();
}
    
     


?>