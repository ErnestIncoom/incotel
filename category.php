<!-- Header -->
<?php include 'includes/header.php' ?>

<title>Blog</title>
</head>
<body>
<!-- NavBar -->
<?php include 'includes/navigation.php' ?>

<!--Page Wrapper-->
<div class="page-wrapper">


<!--Content-->
<div class="content clearfix">


    <!--Main Content-->
    <div class="main-content">
        <h1 class="recent-post-title">Posts</h1>

        <?php 

        if(isset($_GET['category'])){

            $the_post_topic = $_GET['category'];
             
        $query = "SELECT * FROM posts WHERE post_topic = '{$the_post_topic}'";
        $select_category = mysqli_query($conn, $query);

        if(!$select_category){
            die("QUERY FAILED".mysqli_error($conn));
        }

        $count = mysqli_num_rows($select_category);

        if($count == 0){
                echo "No Results";
        } else {


        while($row = mysqli_fetch_array($select_category)){
    
            $post_id = $row['post_id'];
            $post_category_id = $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = substr($row['post_content'],0,100);
        
        ?>
        <div class="post clearfix">
            <img src="images/<?php echo $post_image ?>" class="post-image" alt="#">
            <div class="post-preview">
                <h2><a href="single.php?p_id=<?php echo $post_id?>"><?php echo $post_title ?></a></h2>
                <i class="fa fa-author"><?php echo $post_author ?></i>
                &nbsp;
                <i class="fa fa-calendar"><?php echo $post_date ?></i>
                <p class="preview-text">
                <?php echo $post_content ?>
                </p>
                <a href="single.php" class="btn read-more">Read More</a>
            </div>
        </div>
        <?php }
                }
            }   ?>

    </div>
                
    
    <!--//Main Content-->

    <!--Sidebar-->
    <?php include 'includes/sidebar.php' ?>
    <!--Sidebar-->
</div>
<!--//Content-->
</div>
<!-- // Page Wrapper-->

<!--footer-->
<?php include 'includes/footer.php' ?>
<!--//footer-->

<!--script tag-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--Slick Carousel-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!--custom script-->
<script src="js/scripts.js"></script>

</body>
</html>