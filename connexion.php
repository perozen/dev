<?php
   try{

    $pdo=new pdo("mysql:host=localhost;dbname=dbname;charset=utf8", "username", "password");
      //$pdo=new PDO("mysql:host=localhost;dbname=mabase","user","1234");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?> 