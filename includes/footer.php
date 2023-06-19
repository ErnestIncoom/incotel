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

        <?php 
        
        $query = "SELECT * FROM quick_links";
        $select_all_quick_links = mysqli_query($conn, $query);
    
        while($row = mysqli_fetch_array($select_all_quick_links)){
    
            $link_id = $row['link_id'];
            $link_title = $row['link_title'];
         ?> 
            <ul>
                <a href=""><li><?php echo $link_title; ?></li></a>
            </ul>
        <?php } ?>
        </div>
        <div class="footer-section contact-form">
            <h2>Contact Us</h2>
            <br>

        <?php 

            if(isset($_POST['search'])){

                $contact_email = $_POST['email'];
                $contact_message = $_POST['message'];

            $query = "INSERT INTO contact_us(contact_email, contact_message) VALUES('$contact_email', '$contact_message')";
            $send_message = mysqli_query($conn, $query);
        }
        ?>
        <form action="index.php" method="post">
            <input type="email" name="email" class="text-input contact-input" placeholder="Your email address...">
            <textarea rows="2" name="message" class="text-input contact-input" placeholder="Your message..."></textarea>
            <button type="submit" class="btn btn-big contact-btn" name="search">
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