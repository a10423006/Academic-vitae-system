<?php
    $servername = "212.1.212.1"; //replace it with your database server name
    $username = "bigcattl_test";  //replace it with your database username
    $password = "s6951435";  //replace it with your database password
    $dbname = "bigcattl_formal";
    // Create connection
    $conn = mysql_connect($servername, $username, $password);
    mysql_select_db("bigcattl_formal", $conn);

    mysql_query("set names utf8");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>