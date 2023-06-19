<?php include "../includes/header.php" ?>

<title>Admin Section - Add Users</title>
</head>
<body>

<?php include "../includes/navigation.php" ?>

    <!-- Admin Content -->
    <div class="admin-content">

        <div class="button-group">
            <a href="create.php" class="btn btn-big">Add User</a>
            <a href="index.php" class="btn btn-big">Manage Users</a>
        </div>

        <div class="content">
            <h2 class="page-title"> Add User</h2>

        <?php
            if(isset($_POST['add_user'])){

                $username = $_POST['username'];
                $email = $_POST['email'];
                $pass = $_POST['txt_password'];
                $password =$_POST['passwordConf'];
                $user_role = $_POST['user_role'];

                if($pass != $password){
                 echo "Wrong Password";
                }
                
                else{
            $query = "INSERT INTO users(username, email, password, user_role) ";
            $query .= "VALUES('{$username}','{$email}','{$password}','{$user_role}')";

            $add_user = mysqli_query($conn, $query);

            header("location: index.php");


        }

            }
        ?>
        <form action="create.php" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" class="text-input">
            </div>
        
            <div>
                <label for="email">E-mail</label>
                <input type="email" name="email" class="text-input">
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
                    <option name="user_role" value="Author">Author</option>
                    <option name="user_role" value="Admin">Admin</option>
                </select>
            </div>

            <div>
                <button type="submit" class="btn btn-big" name="add_user">Add User</button>
            </div>
        </form>

        </div>
    </div>
    <!-- // Admin Content -->
</div>
<!-- //Admin Page Wrapper-->



<!--script tag-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- ckeditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

 <!--custom script-->
<script src="../../js/scripts.js"></script>



</body>
</html>