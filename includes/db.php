
<?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "incotel";


        $conn = mysqli_connect($hostname, $username, $password, $dbname);

        if(!$conn){

            DIE("QUERY ERROR");
        }



?>