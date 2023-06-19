<!-- Header -->
<?php include 'includes/header.php' ?>


<title>Single Post</title>
</head>
<body>

<!-- NavBar -->
<?php include 'includes/navigation.php' ?>

<!--Page Wrapper-->
<div class="page-wrapper">

<!--Content-->
<div class="content clearfix">


    <!--Main Content-->
    <?php 

    if(isset($_GET['p_id'])){

        $the_post_id = $_GET['p_id'];
    }
        
        $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
        $select_all_posts = mysqli_query($conn, $query);
    
        while($row = mysqli_fetch_array($select_all_posts)){
    
            $post_id = $row['post_id'];
            $post_category_id = $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
        
        ?>
    <div class="main-content-wrapper">
    <div class="main-content single">
        
        <img src="images/<?php echo $post_image ?>" class="post-image" width="50%" style="display: block; margin-left: auto; margin-right: auto;" alt="#">
        <h1 class="post-title"><?php echo $post_title; ?></h1>

       <div class="post-content"><?php echo $post_content; ?></div>
    </div>
    </div>
    <?php } ?>

    
    <!--//Main Content-->

    <!--Sidebar-->
    <div class="sidebar single">

       <div class="section popular">
            <h2 class="popular-title">Popular Posts</h2>


                    <?php 

                    if(isset($_GET['topic'])){

                    $get_topic = $_GET['topic'];
                    }

                    $query = "SELECT * FROM posts WHERE post_topic = '{$get_topic}'";
                    $topic_query = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($topic_query)){

                    $post_title = substr($row['post_title'],0,30);
                    $post_image = $row['post_image'];
                    $post_topic = $row['post_topic'];


                    ?>
            <div class="post clearfix">
                <img src="images/<?php echo $post_image?>" alt="">
                <a href="single.php?p_id=<?php echo $post_id?>&topic=<?php echo $post_topic?>" class="title">
                    <h4><?php echo $post_title; ?></h4>
                </a>
            </div>
            <?php } ?>
        </div>

        <!-- <div class="section search">
            <h2 class="section-title">Search</h2>
            <form action="index.html" method="post">
                <input type="text" name="search-term" class="text-input" placeholder="Search....">
            </form>
        </div> -->

        <div class="section topics">
            <h2 class="section-title">Topics</h2>
            
            <?php 
        
        $query = "SELECT * FROM topics";
        $select_all_topics = mysqli_query($conn, $query);
        
        while($row = mysqli_fetch_array($select_all_topics)){
    
            $topic_id = $row['topic_id'];
            $topic_title = $row['topic_title'];
         ?>   
            <ul>
              <?php echo "<li><a href='category.php?category={$topic_title}' value='{$topic_id}'>{$topic_title}</a></li>" ?>

            </ul>
            <?php } ?>
        </div> 
    </div>
    <!--Sidebar-->
</div>
<!--//Content-->
</div>
<!-- // Page Wrapper-->

<!--footer-->
<div class="footer">
    <div class="footer-content">    
        <div class="footer-section about">
            <h1 class="logo-text"><span>Saint</span>JOGH</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                Sapiente incidunt consectetur, quidem quis ut reiciendis!</p>
                
                <div class="contact">
                    <span><i class="fa fa-phone"></i>&nbsp; 0274247667</span>
                    <span><i class="fa fa-envelope"></i>&nbsp;info@sjogh.com</span>
                </div>
        
                <div class="socials">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
        <div class="footer-section links">
            <h2>Quick Links</h2>
            <br>
            <ul>
                <a href=""><li>Events</li></a>
                <a href=""><li>Team</li></a>
                <a href=""><li>Mentores</li></a>
                <a href=""><li>Gallery</li></a>
                <a href=""><li>Terms and Conditions</li></a>
            </ul>
        </div>
        <div class="footer-section contact-form">
            <h2>Contact Us</h2>
            <br>
        <form action="index.html" method="post">
            <input type="email" name="email" class="text-input contact-input" placeholder="Your email address...">
            <textarea rows="2" name="message" class="text-input contact-input" placeholder="Your message..."></textarea>
            <button type="submit" class="btn btn-big contact-btn">
                <i class="fa fa-envelope"></i>
                Send
            </button>
        </form>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; Designed By Incoom
    </div>

</div>
<!--//footer-->

<!--script tag-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--Slick Carousel-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!--custom script-->
<script src="js/scripts.js"></script>

</body>
</html>