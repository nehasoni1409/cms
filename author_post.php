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
                        $the_post_author=$_GET['author'];
                    }

                     $query="SELECT * FROM posts WHERE post_user='$the_post_author' ";
                     $select_all_posts=mysqli_query($connection,$query);
                     if(!$select_all_posts)
                     {
                         die("query failed".mysqli_error($select_all_posts));
                     }
                ?>
                <?php
                     while($row=mysqli_fetch_assoc($select_all_posts))
                     {
                         $post_title=$row['post_title'];
                         $post_user=$row['post_user'];
                         $post_date=$row['post_date'];
                         $post_image=$row['post_image'];
                         $post_content=$row['post_content'];
                     
                     
                ?>  
                     

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                 All Posts By:<?php echo $post_user; ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="./images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

                <hr>
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