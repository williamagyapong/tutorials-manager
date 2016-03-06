<?php 
  $dbhost = "mysql1.000webhost.com";
  $mysqlUser = "a3505475_william";
  $mysqlPass = "willi002036";
  $dbname  = "a3505475_prog";
  /*$dbhost = "localhost";
  $mysqlUser = "root";
  $mysqlPass = "";
  $dbname = "quiz";*/

  mysqli_connect($dbhost, $mysqlUser, $mysqlPass,$dbname) or die('failed to connect');
   //mysql_select_db($dbname) or die('database selection failed');
  /*if($connect && $select_db)
  {
         echo "connected";
  }
  else
  {
  	echo "connection failed";
  }*/
 
?>
