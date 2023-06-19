
    <!-- Admin Content -->
    <div class="admin-content">

        <div class="button-group">
            <a href="create.php" class="btn btn-big">Add User</a>
            <a href="index.php" class="btn btn-big">Manage Users</a>
        </div>

        <div class="content">
            <h2 class="page-title"> Add User</h2>

        <?php

            if(isset($_GET['u_id'])){

                $the_user_id = $_GET['u_id'];
            }

            $query = "SELECT * FROM users WHERE user_id = '{$the_user_id}'";
            $select_users = mysqli_query($conn, $query);

            while($row=mysqli_fetch_array($select_users)){

                $username = $row['username'];
                $email = $row['email'];
                $user_role = $row['user_role'];
            }

            if(isset($_POST['edit_user'])){

                $username = $_POST['username'];
                $email = $_POST['email'];
                $pass = $_POST['txt_password'];
                $password =$_POST['passwordConf'];
                $user_role = $_POST['user_role'];

                if($pass != $password){
                 echo "Wrong Password";
                }
                
                else{
            $query = "UPDATE users SET ";
            $query .= "username = '{$username}', ";
            $query .= "email = '{$email}', ";
            $query .= "password = '{$password}', ";
            $query .= "user_role = '{$user_role}' ";
            $query .= "WHERE user_id = '{$the_user_id}'";

            $add_user = mysqli_query($conn, $query);

            header("location: index.php");


        }

            }
        ?>
        <form action="" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" class="text-input" value="<?php echo $username ?>">
            </div>
        
            <div>
                <label for="email">E-mail</label>
                <input type="email" name="email" class="text-input" value="<?php echo $email ?>">
            </div>
        
            <div>
                <label for="password">Password</label>
                <input type="password" name="txt_password" class="text-input">
            </div>
        
            <div>
                <label for="passwordConf">Confirm Password</label>
                <input type="password" name="passwordConf" class="text-input">
            </div>

            <div>
                <label for="">Role</label>
                <select name="user_role" class="text-input">

                <?php 

                        $query = "SELECT * FROM users WHERE user_id = '{$the_user_id}'";
                        $select_users = mysqli_query($conn, $query);

                        while($row=mysqli_fetch_array($select_users)){
                            $user_role = $row['user_role'];
                        

                        if($user_role = "Author"){

                            echo "<option name='user_role' value='{$user_role}'>{$user_role}</option>";
                            echo "<option name='user_role' value='Admin'>Admin</option>";
                        } else if($user_role = "Admin"){
                            echo "<option name='user_role' value='{$user_role}'>{$user_role}</option>";
                            echo "<option name='user_role' value='Author'>Author</option>";
                        }

                    }
                
                ?>
                </select>
            </div>

            <div>
                <button type="submit" class="btn btn-big" name="edit_user">Edit User</button>
            </div>
        </form>

        </div>
    </div>
    <!-- // Admin Content -->
</div>
<!-- //Admin Page Wrapper-->
