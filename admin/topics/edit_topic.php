        <div class="button-group">
            <a href="create.php" class="btn btn-big">Add Topics</a>
            <a href="index.php" class="btn btn-big">Manage Topics</a>
        </div>

        <div class="content">
            <h2 class="page-title"> Add Topic</h2>

            <?php
            
            if(isset($_GET['t_id'])){
    
                $the_topic_id = $_GET['t_id'];
            }
            
            $query = "SELECT * FROM topics WHERE topic_id = {$the_topic_id}";
            $select_all_topics = mysqli_query($conn, $query);

            while($row=mysqli_fetch_array($select_all_topics)){

            $topic_title = $row['topic_title'];
            $topic_description = $row['topic_description'];

            };

            if(isset($_POST['edit_topic'])){

                $topic_title = $_POST['topic_title'];
                $topic_description = $_POST['topic_description'];
            
                //Update Query

                $query  = "UPDATE topics SET ";
                $query .= "topic_title = '{$topic_title}', ";
                $query .= "topic_description = '{$topic_description}' ";
                $query .= "WHERE topic_id = '{$the_topic_id}'";

                $update_topic = mysqli_query($conn, $query);

                if(!$update_topic){
                    die("Query Failed".mysqli_error($conn));
                }

                header("location: index.php");
            
            
            }
        ?>

        <form action="" method="post">
            <div>
                <label for="">Title</label>
                <input type="text" value="<?php echo $topic_title ?>" name="topic_title" id="" class="text-input">
            </div>
            <div>
                <label for="">Description</label>
                <textarea name="topic_description" id="body"><?php echo $topic_description ?></textarea>
            </div>
            <div>
                <button type="submit" name="edit_topic" class="btn btn-big">Add Topic</button>
            </div>
        </form>
        </div>
    </div>
    <!-- // Admin Content -->
</div>
<!-- //Admin Page Wrapper-->

