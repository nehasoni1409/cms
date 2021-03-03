<?php include "includes/db.php"; ?>
<?php include "includes/header.php";  ?>
<?php  include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                  
                    if(isset($_GET['p_id']))
                    {
                        $the_post_id=$_GET['p_id'];
                    }
                    $view_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $the_post_id ";
                    $result=mysqli_query($connection,$view_query);
                     
                     $query="SELECT * FROM posts WHERE post_id = $the_post_id";
                     $select_all_posts=mysqli_query($connection,$query);
                     if(!$select_all_posts)
                     {
                         die("query failed".mysqli_error($select_all_posts));
                     }
                
                     while($row=mysqli_fetch_assoc($select_all_posts))
                     {
                         $post_title=$row['post_title'];
                         $post_user=$row['post_user'];
                         $post_date=$row['post_date'];
                         $post_image=$row['post_image'];
                         $post_content=$row['post_content'];
                     
                     
                ?>  
                     

                <!-- <h1 class="page-header"> -->
                    <!-- Posts -->
                    <!-- <small>Secondary Text</small> -->
                <!-- </h1> -->

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_user; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="./images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                
                  

                <hr>
                <!-- <div class="row">
                      <p class="pull-right"><a class="like" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>Like</a></p>
                  </div>
                  <div class="row">
                    <p class="pull-right">Like:10</p>
                  </div>
                  <div class="clearfix"></div> -->
                <?php    
                    }
                
                ?>
                <!-- Blog Comments -->
                <?php
                   if(isset($_POST['submit']))
                   {
                        $the_post_id=$_GET['p_id'];
                        $comment_author=mysqli_real_escape_string($connection, $_POST['comment_author']);
                        $comment_email=mysqli_real_escape_string($connection, $_POST['comment_email']);
                        $comment_content=mysqli_real_escape_string($connection, $_POST['comment_content']);

                        if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content))
                        {
                            $query="INSERT INTO `comments`(`comment_post_id`, `comment_author`, 
                            `comment_email`, `comment_content`, `comment_status`, `comment_date`)
                            VALUES($the_post_id, '$comment_author', '$comment_email',
                             '$comment_content', 'Approved', now())";
    
                             $create_comment_query=mysqli_query($connection,$query);
    
                            //  $query = "UPDATE posts SET post_comment_count = post_comment_count+1 ";
                            //  $query .= " WHERE post_id = $the_post_id";
                            //  $update_comment_count=mysqli_query($connection,$query);
                            //  if(!$update_comment_count)
                            //  {
                            //      die("query failed".mysqli_error($connection));
                            //  }
                        }
                        else
                        {
                            echo "<script>alert('Fields cannot be empty')</script>";
                        }



                        

                   }
             
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                        <label for="author">Author</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>

                        <div class="form-group">
                        <label for="email">Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>

                        <div class="form-group">
                        <label for="comment">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                  <?php
                      $query="SELECT * FROM comments WHERE comment_post_id = $the_post_id ";
                      $query .= "AND comment_status = 'Approved' ";
                      $query .= "ORDER BY comment_id DESC ";
                      $select_comment_query=mysqli_query($connection,$query);
                      if(!$select_comment_query)
                      {
                          die("QUERY FAILED".mysqli_error($connection));
                      }
                      while($row=mysqli_fetch_assoc($select_comment_query))
                      {
                          $comment_author=$row['comment_author'];
                          $comment_date=$row['comment_date'];
                          $comment_content=$row['comment_content'];
                    ?>
                    <!-- Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $comment_author;  ?>
                                <small><?php echo $comment_date; ?></small>
                            </h4>
                            <?php echo $comment_content; ?>
                        </div>
                   </div> 
                    <?php
                      } 

                  ?>


                <!-- Comment -->
               
            </div>

            <!-- Blog Sidebar Widgets Column -->
              <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php";  ?>    
<!-- <script>
     $(document).ready(function(){
         $('.like').click(function(){
             $.ajax({
                  
             });
         });
     });
</script>     -->