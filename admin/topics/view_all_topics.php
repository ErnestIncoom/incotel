        <div class="button-group">
            <a href="create.php" class="btn btn-big">Add Topic</a>
            <a href="index.php" class="btn btn-big">Manage Topics</a>
        </div>

        <div class="content">
            <h2 class="page-title"> Manage Topics</h2>

        <table>
            <thead>
                <th>SN</th>
                <th>Name</th>
                <th>Description</th>
                <th colspan="2">Action</th>
            </thead>

            <?php 
                $query = "SELECT * FROM topics";
                $select_all_topics = mysqli_query($conn, $query);

                while($row=mysqli_fetch_array($select_all_topics)){

                    $topic_id = $row['topic_id'];
                    $topic_title = $row['topic_title'];
                    $topic_description = $row['topic_description'];
        
            ?> 
            <tbody>
                <tr>
                    <td><?php echo $topic_id ?></td>
                    <td><?php echo $topic_title?></td>
                    <td><?php echo $topic_description ?></td>
                    <td><?php echo "<a href='index.php?source=edit_topic&t_id={$topic_id}' class='edit'>edit</a>" ?></td>
                    <td><?php echo "<a href='index.php?delete={$topic_id}' class='delete'>delete</a>" ?></td>
                </tr>
            <?php } ?>

            <?php
                    //Delete Query

                    if(isset($_GET['delete'])){

                        $the_topic_id = $_GET['delete'];

                        $query = "DELETE FROM topics WHERE topic_id = {$the_topic_id}";
                        $delete_topic = mysqli_query($conn, $query);

                        header("location: index.php");
            
                    }


            ?>

            </tbody>
        </table>

        </div>


<!--script tag-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--custom script-->
<script src="../../js/scripts.js"></script>

</body>
</html>