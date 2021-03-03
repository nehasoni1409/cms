
<?php
  if(ifItIsMethod('post'))
  {
      if(isset($_POST['login']))
      {
            if(isset($_POST['username']) && isset($_POST['password']))
            {
            login_users($_POST['username'], $_POST['password']);
            }
            else
            {
            redirect('index');
            }
      }

  }
?>
<div class="col-md-4">
 


<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
        
        <div class="input-group">
            <input type="text" class="form-control" name="search">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
    </form>
    
</div>

<!-- Login -->
<div class="well">

       
            <h4>Login</h4>
            <form method="post" >
                
                <div class="form-group">
                    <input type="text" class="form-control" name="username"  placeholder="Enter Username">
                    
                </div>
                <div class="input-group">
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                <span class="input-group-btn">
                <button class="btn btn-primary" name="login" type="submit">Submit</button>
                </span>
                </div>
                <div class="form-group">
                  <a href="forgot.php?forgot=<?php echo uniqid(true); ?>">Forgot Password</a>
                </div>
            </form>
        

  
</div>





<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
            <?php   
                    
                    $query="SELECT * FROM categories";
                    $select_all_categories=mysqli_query($connection,$query);
                    if(!$select_all_categories)
                         {
                             die("querry failed".mysqli_error($select_all_categories));
                         }
                 
                 ?>
                 <?php
                     while($row=mysqli_fetch_assoc($select_all_categories))
                       {
                            $cat_title=$row['cat_title'];
                            $cat_id=$row['cat_id'];
                            echo "<li><a href='category.php?category=$cat_id'>$cat_title</a></li>";
                       }
                 ?>

            </ul>
        </div>

        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
    <h4>Web Development</h4>
    <p>In the process of Web Development, Developers build web pages and applications
    for either the Intranet, a private network, or the Internet.
    Web Development does not necessarily focus on a website’s design;
    rather, it is majorly concerned with the programming and coding part, which is the
    main reason for the functioning of the website.</p>
    <p>From basic and simple websites to complex web applications and social media 
    platforms and from numerous online shopping web pages to even content management systems (CMS),
    all the online tools and websites that we use on a regular basis are part of Web Development.
    Besides, all these tools and websites are built by Web Developers.</p>
</div>

</div>