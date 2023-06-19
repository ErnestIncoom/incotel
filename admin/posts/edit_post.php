<div class="button-group">
            <a href="create.php" class="btn btn-big">Add Post</a>
            <a href="index.php" class="btn btn-big">Manage Posts</a>
        </div>

        <div class="content">
            <h2 class="page-title"> Manage Posts</h2>

        <?php         

            if(isset($_GET['p_id'])){

                $the_post_id = $_GET['p_id'];
            }
                
                $query = "SELECT * FROM posts where post_id = $the_post_id";
                $select_posts= mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($select_posts)){
                $post_category_id = $row['post_category_id'];
                $post_title =   $row['post_title'];
                $post_author =  $row['post_author'];
                $post_image =   $row['post_image'];
                $post_content = $row['post_content'];
                $post_tags =    $row['post_tags'];
                $post_status =  $row['post_status'];
            
                }

               if(isset($_POST['submit'])){

                    $post_category_id = $_POST['post_category_id'];
                    $post_title = $_POST['post_title'];
                    $post_author = $_POST['post_author'];
                    $post_date = date('d-m-y');

                    $post_image = $_FILES['post_image']['name'];
                    $post_image_temp = $_FILES['post_image']['tmp_name'];
                    
                    $post_content = $_POST['post_content'];
                    $post_topic = $_POST['post_topic'];
                    $post_tags = $_POST['post_tags'];
                    $post_status = $_POST['post_status'];

                    move_uploaded_file($post_image_temp, "../../images/$post_image");

                    if(empty($post_image)){

                        $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
                        $select_image = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($select_image)){

                            $post_image = $row['post_image'];
                        }
                    }

                    $query  ="UPDATE posts SET ";
                    $query .="post_title = '{$post_title}', ";
                    $query .="post_author = '{$post_author}', ";
                    $query .="post_content = '{$post_content}', ";
                    $query .="post_topic = '{$post_topic}', ";
                    $query .="post_image = '{$post_image}', ";
                    $query .="post_date = now(), ";
                    $query .="post_tags = '{$post_tags}', ";
                    $query .="post_status = '{$post_status}' ";
                    $query .="WHERE post_id = '{$the_post_id}'; ";
                    
                    $update_query = mysqli_query($conn, $query);

                    if(!$update_query){
                        die ("QUERY FAILED".mysqli_error($conn));
                    }
        
                    header("Location: index.php");

               }
                
        ?>

        
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="">Title</label>
                <input type="text" name="post_title" value="<?php echo $post_title ?>" id="" class="text-input">
            </div>
            <div>
                <label for="">Author</label>
                <input type="text" name="post_author" value="<?php echo $post_author ?>" id="" class="text-input">
            </div>
            <div>
                <label for="">Content</label>
                <textarea name="post_content" value="" id="body"><?php echo $post_content ?></textarea>
            </div>
            <div>
                <label for="">Image</label>
                <input type="file" name="post_image" value="<?php echo $post_image ?>" class="text-input" src="" alt="">
            </div>
            <div>
                <label for="">Topic</label>
                <select name="post_topic" class="text-input">
                
                <?php 
                
                $query = "SELECT * FROM topics";
                $select_topics = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($select_topics)){

                    $topic_id = $row['topic_id'];
                    $topic_title = $row['topic_title'];

                ?>
                    <?php  echo  "<option value='{$topic_title}'>{$topic_title}</option>" ?>

                    <?php  } ?>
                </select>
                
                
            </div>
            <div>
                <label for="">Tags</label>
                <input type="text" name="post_tags" value="<?php echo $post_tags ?>" id="" class="text-input">
            </div>
            <div>
                <label for="">Status</label>
                <input type="text" name="post_status" value="<?php echo $post_status ?>" id="" class="text-input">
            </div>
            <div>
                <button type="submit" class="btn btn-big" name="submit">Edit Post</button>
            </div>
        </form>

        </div>