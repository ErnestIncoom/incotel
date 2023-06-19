<?php include "../includes/header.php" ?>

<title>Admin Section - Manage Posts</title>
</head>
<body>

<?php include "../includes/navigation.php" ?>

    <!-- Admin Content -->
    <div class="admin-content">

    <?php 
                            if(isset($_GET['source'])){
                                $source = $_GET['source'];
                            } else {
                                $source = "";
                            } 
                                switch($source){
                                    case 'edit_post';
                                    include 'edit_post.php';
                                    break;  

                                    case '300';
                                    echo 'Display 300';
                                    break;

                                    default:

                                    include "view_all_posts.php";

                                    break;
                                }
                                                 
                        ?>
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