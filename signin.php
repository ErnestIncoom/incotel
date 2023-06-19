<?php include "includes/db.php"; ?>

<?php
        if(isset($_POST['txt_username']) && isset($_POST['txt_password'])){

            function validate($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $txt_username = validate($_POST['txt_username']);
            $txt_password = validate($_POST['txt_password']);

            if(empty($txt_username)){
                header("location: login.php?error=Username is Empty");
                exit();
            } else if(empty($txt_password)){
                header("location: login.php?error=Password is Empty");
                exit();
            }
            
            else{

                $query = "SELECT * FROM users WHERE username='{$txt_username}' AND password ='{$txt_password}'";
                $login_query = mysqli_query($conn, $query);

                
                if (mysqli_num_rows($login_query) === 1){

                    if($row['username'] === $txt_username && $row['password'] === $txt_password){

                        $_SESSION['txt_username'] = $row['username'];
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['user_role'] = $row['user_role'];

                        header("location: index.php");
                        exit();

                    }
                    else{
                        header("location: login.php?error=Incorrect Username or Password");
                    }
                }
            
            }

        }
            else{

                header("location: login.php?error");
                exit();
            }
?>