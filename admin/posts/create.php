<?php include "../includes/header.php" ?>

<title>Admin Section - Add Post</title>
</head>
<body>

<?php include "../includes/navigation.php" ?>

    <!-- Admin Content -->
    <div class="admin-content">

        <div class="button-group">
            <a href="create.php" class="btn btn-big">Add Post</a>
            <a href="index.php" class="btn btn-big">Manage Posts</a>
        </div>

        <div class="content">
            <h2 class="page-title"> Manage Posts</h2>

        <?php
                if(isset($_POST['add_post'])){

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

                    $query="INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_topic, post_tags, post_status) ";
                    $query.="VALUES($post_category_id,'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_topic}','{$post_tags}','{$post_status}')";
                
                    $create_post = mysqli_query($conn, $query);

                    if(!$create_post){
                        die("QUERY FAILED").mysqli_error($conn);
                    }
                
                    header("location: index.php");
                }

        ?>
        <form action="create.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="">Title</label>
                <input type="text" name="post_title" id="" class="text-input">
            </div>
            <div>
                <label for="">Category Id</label>
                <input type="text" name="post_category_id" id="" class="text-input">
            </div>
            <div>
                <label for="">Author</label>
                <input type="text" name="post_author" id="" class="text-input">
            </div>
            <div>
                <label for="">Content</label>
                <textarea name="post_content" id="body"></textarea>
            </div>
            <div>
                <label for="">Image</label>
                <input type="file" name="post_image" class="text-input" src="" alt="">
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
                <input type="text" name="post_tags" id="" class="text-input">
            </div>
            <div>
                <label for="">Status</label>
                <input type="text" name="post_status" id="" class="text-input">
            </div>
            <div>
                <button type="submit" class="btn btn-big" name="add_post">Add Post</button>
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