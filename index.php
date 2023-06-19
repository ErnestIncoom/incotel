<!-- Header -->
<?php include 'includes/header.php' ?>

<title>Blog</title>
</head>
<body>
<!-- NavBar -->
<?php include 'includes/navigation.php' ?>

<!--Page Wrapper-->
<div class="page-wrapper">

<!--Post Slider-->


<div class="post-slider">
<h1 class="slider-title">Trending Posts</h1>
<i class="fa fa-chevron-left prev"></i>
<i class="fa fa-chevron-right next"></i>
<div class="post-wrapper">

<?php 

    $query = "SELECT * FROM posts";
    $select_all_posts = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($select_all_posts)){

        $post_id = $row['post_id'];
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_topic = $row['post_topic'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];

        ?>
 
<div class="post">
    <img src="images/<?php echo $post_image; ?>" alt="#" class="slider-image">
    <div class="post-info">
        <h4><a href="single.php?p_id=<?php echo $post_id?>&topic=<?php echo $post_topic?>"><?php echo $post_title; ?></a></h4>
        <i class="fa fa-user"><?php echo $post_author; ?></i>
        &nbsp;
        <i class="fa fa-calendar"><?php echo $post_date; ?></i>
 </div>
 </div>
<?php    } ?>


</div>
</div>
<!-- // Post Slider-->

<!--Content-->
<div class="content clearfix">


    <!--Main Content-->
    <div class="main-content">
        <h1 class="recent-post-title">Recent Posts</h1>


        <?php 
        
        $query = "SELECT * FROM posts";
        $select_all_posts = mysqli_query($conn, $query);
    
        while($row = mysqli_fetch_array($select_all_posts)){
    
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
                <h2><a href="single.php?p_id=<?php echo $post_id?>&topic=<?php echo $post_topic?>"><?php echo $post_title ?></a></h2>
                <i class="fa fa-author"><?php echo $post_author ?></i>
                &nbsp;
                <i class="fa fa-calendar"><?php echo $post_date ?></i>
                <p class="preview-text">
                <?php echo $post_content ?>
                </p>
                <a href="single.php?p_id=<?php echo $post_id?>&topic=<?php echo $post_topic?>" class="btn read-more">Read More</a>
            </div>
        </div>
        <?php }?>

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