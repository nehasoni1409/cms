<?php include "includes/db.php"; ?>
<?php include "includes/header.php";  ?>
<?php  include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">
    <div class="well">
    <h4>What Is Web Development ?</h4>
    <p>This blog covers some of the crucial and most important information in the field
     of Web Development. Here, you will get a basic idea of what Web Development is and
      how it works. Once you understand the meaning of Web Development, you will come 
    across various platforms, tools, technologies, and languages used in this field</p>
    <p>This Blog includes the topics of:Web development technologies(HTML,CSS)</br>
    Web development frameworks(Bootstrap,Jquery,Laravel)</br>Web Development Language(PHP,ASP.NET)</p>
    </div>
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                // you can set the per_page value instaed of writing 5
                   if(isset($_GET['page']))
                   {
                       $page=$_GET['page'];
                   }
                   else
                   {
                       $page="";
                   }
                   if($page == "" || $page == 1)
                   {
                       $page_1 = 0;
                   }
                   else
                   {
                       $page_1 = ($page * 5) - 5;
                   }
                   
                   $post_query_count="SELECT * FROM posts WHERE post_status='published' ";
                   $find_query=mysqli_query($connection,$post_query_count);
                   $count=mysqli_num_rows($find_query);
                  if($count < 1)
                  {
                      echo "<h1 class='text-center'>No Posts</h1>";
                  }
                  else
                  {
                   
                   $count=ceil($count/5);

                     $query="SELECT * FROM posts LIMIT $page_1,5 ";
                     $select_all_posts=mysqli_query($connection,$query);
                     if(!$select_all_posts)
                     {
                         die("query failed".mysqli_error($select_all_posts));
                     }
                ?>
                <?php
                     while($row=mysqli_fetch_assoc($select_all_posts))
                     {
                         $post_id=$row['post_id'];
                         $post_title=$row['post_title'];
                         $post_user=$row['post_user'];
                         $post_date=$row['post_date'];
                         $post_image=$row['post_image'];
                         $post_content=substr($row['post_content'],0,234);
                         $post_status=$row['post_status'];
                         
                     

                         
                     
                     
                ?>  
                     

                <!-- <h1 class="page-header"> -->
                    <!-- WEB DEVELOPMENT -->
                    <!-- <small>Secondary Text</small> -->
                <!-- </h1> -->
                 
                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?author=<?php echo $post_user; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_user; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="./images/<?php echo $post_image; ?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content; ?></p>
                <br>

                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php    
                    }  }
                ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
              <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->
          <ul class="pager">
             <?php
                for($i=1;$i<=$count;$i++)
                {
                    if($i==$page)
                    {
                    echo "<li><a class='active_link' href ='index.php?page=$i'>$i</a></li>";
                    }
                    else
                    {
                        echo "<li><a href ='index.php?page=$i'>$i</a></li>";
                    }
                }
             ?>
          </ul>
        <hr>

<?php include "includes/footer.php";  ?>        