        <div class="button-group">
            <a href="create.php" class="btn btn-big">Add Post</a>
            <a href="index.php" class="btn btn-big">Manage Posts</a>
        </div>

        <div class="content">
            <h2 class="page-title"> Manage Posts</h2>
       
         <table>
            <thead>
                <th>Post Id</th>
                <th>Post Title</th>
                <th>Post Author</th>
                <th>Post Date</th>
                <th>Post Image</th>
                <th>Post Content</th>
                <th>Post Topic</th>
                <th>Post Tags</th>
                <th>Post Status</th>
                <th colspan="3">Action</th>
            </thead>
       
       <?php
            $query = "SELECT * FROM posts";
            $select_all_from_posts = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($select_all_from_posts)){

                $post_id = $row['post_id'];
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'],0,50);
                $post_topic = $row['post_topic'];
                $post_tags = $row['post_tags'];
                $post_status = $row['post_status'];
        ?>
            <tbody>
                <tr>
                    <td><?php echo $post_id ?></td>
                    <td><?php echo $post_title ?></td>
                    <td><?php echo $post_author ?></td>
                    <td><?php echo $post_date ?></td>
                    <td><?php echo "<img width='100' src='../../images/$post_image'" ?></td>
                    <td><?php echo $post_content ?></td>
                    <td><?php echo $post_topic ?></td>
                    <td><?php echo $post_tags ?></td>
                    <td><?php echo $post_status ?></td>
                    <td><?php echo "<a href='index.php?source=edit_post&p_id={$post_id}' class='edit'>edit</a>" ?></td>
                    <td><?php echo "<a href='index.php?delete={$post_id}' class='delete'>delete</a>" ?></td>
                    <td><?php echo "<a href='index.php?publish={$post_id}' class='publish'>publish</a>"?></td>
                </tr>
            </tbody>
            <?php  } ?>
        </table>
                <?php 
                        //Query Delete
                        if(isset($_GET['delete'])){

                            $the_post_id = $_GET['delete'];

                            $query  = "DELETE FROM posts WHERE post_id = {$the_post_id}";
                            $delete_post = mysqli_query($conn, $query);

                            header("Location: index.php");
                        
                        }

                        //Query Delete
                        if(isset($_GET['publish'])){

                            $the_post_id = $_GET['publish'];

                            $query  = "UPDATE posts SET post_status = 'Published' WHERE post_id = '{$the_post_id}'";
                            $delete_post = mysqli_query($conn, $query);

                            header("Location: index.php");
                        
                        }


                ?>
        </div>