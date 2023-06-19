<?php include "../includes/header.php" ?>

<title>Admin Section - Add Topic</title>
</head>
<body>

<?php include "../includes/navigation.php" ?>

    <!-- Admin Content -->
    <div class="admin-content">

        <div class="button-group">
            <a href="create.php" class="btn btn-big">Add Topics</a>
            <a href="index.php" class="btn btn-big">Manage Topics</a>
        </div>

        <div class="content">
            <h2 class="page-title"> Add Topic</h2>


            <?php 
                    if(isset($_POST['add_topic'])){

                    $topic_title = $_POST['topic_title'];
                    $topic_description = $_POST['topic_description'];
                    
                    $query ="INSERT INTO topics(topic_title, topic_description) ";
                    $query .="VALUES('{$topic_title}','{$topic_description}')";
                    
                    $add_topics = mysqli_query($conn, $query);
                        

                }
            
            ?>

        <form action="create.php" method="post">
            <div>
                <label for="">Title</label>
                <input type="text" name="topic_title" id="" class="text-input">
            </div>
            <div>
                <label for="">Description</label>
                <textarea name="topic_description" id="body"></textarea>
            </div>
            <div>
                <button type="submit" name="add_topic" class="btn btn-big">Add Topic</button>
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