<?php 
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname   = "incotel";


        $conn = mysqli_connect($hostname, $username, $password, $dbname);

        if(!$conn){
            die("QUERY FAILED");
        }
?>