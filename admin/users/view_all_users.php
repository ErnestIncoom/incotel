    <!-- Admin Content -->
    <div class="admin-content">

        <div class="button-group">
            <a href="create.php" class="btn btn-big">Add User</a>
            <a href="index.php" class="btn btn-big">Manage Users</a>
        </div>

        <div class="content">
            <h2 class="page-title"> Manage Users</h2>

        <table>
            <thead>
                <th>SN</th>
                <th>Username</th>
                <th>Role</th>
                <th colspan="2">Action</th>
            </thead>
            <tbody>
                    <?php 
                $query = "SELECT * FROM users";
                $select_all_users = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($select_all_users)){

                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $user_role = $row['user_role'];
                    ?>
                <tr>
                    <td><?php echo $user_id ?></td>
                    <td><?php echo $username ?></td>
                    <td><?php echo $user_role ?></td>
                    <td><?php echo "<a href='index.php?source=edit_user&u_id={$user_id}' class='edit'>edit</a>" ?></td>
                    <td><?php echo "<a href='index.php?delete={$user_id}' class='delete'>delete</a>" ?> </td>
                </tr>

                <?php } ?>
            </tbody>
        </table>
                <?php 
                    //Delete

                    if(isset($_GET['delete'])){
                        
                    $the_user_id = $_GET['delete'];
                        
                    $query = "DELETE FROM users WHERE user_id = '{$the_user_id}'";
                    $delete_query = mysqli_query($conn, $query);

                    header("location: index.php");
                }
                ?>
        </div>
    </div>
    <!-- // Admin Content -->
</div>
<!-- //Admin Page Wrapper-->
