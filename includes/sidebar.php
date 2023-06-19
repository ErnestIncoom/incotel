<div class="sidebar">

        <div class="section search">
            <h2 class="section-title">Search</h2>
            <form action="search.php" method="post">
                <input type="text" name="search_post" class="text-input" placeholder="Search...." required><br>
                <input type="submit" name="submit" class="btn read-more" value="Search" required>
            </form>
        </div>

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
