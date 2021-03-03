<?php include "includes/admin_header.php"; ?>
<?php
  if(isset($_SESSION['username']))
    {
        $user=$_SESSION['username'];
        $query="SELECT * FROM users WHERE username='$user'";
        $select_user_profile=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_user_profile))
        {
            $user_id=$row['user_id'];
            $username=$row['username'];
            $user_password=$row['user_password'];
            $user_firstname=$row['user_firstname'];
            $user_lastname=$row['user_lastname'];
            $user_email=$row['user_email'];
            // $user_image=$row['user_image'];
            $user_role=$row['user_role'];
        }
    }
  

?>
<?php
    if(isset($_POST['submit']))
    {
        $username=$_POST['username'];
        $user_role=$_POST['role'];
        $user_firstname=$_POST['fname'];
        $user_lastname=$_POST['lname'];
        $user_email=$_POST['email'];
        $user_password=$_POST['password'];
        
        $query="UPDATE `users` SET `username` = '$username', `user_password` = '$user_password',
        `user_firstname` = '$user_firstname', `user_lastname` = '$user_lastname', 
        `user_email` = '$user_email', `user_role` = '$user_role' 
        WHERE `users`.`username` = '$user' ";
       $update_user_query=mysqli_query($connection,$query);
       if(!$update_user_query)
       {
           die("Querry failed!".mysqli_error($connection));
       }
    }
?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To Admin
                        <small>Author</small>
                    </h1>
    <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label for="title">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
                <select name="role">
                <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
                <?php
                    if($user_role=='admin')
                    {
                        echo "<option value='subscriber'>subscriber</option>";
                    }
                    else
                    {
                        echo "<option value='admin'>admin</option>";
                    }
                ?>
                
                
                </select>
            </div>

            <div class="form-group">
            <label for="post_author">Firstname</label>
            <input type="text" class="form-control" name="fname" >
            </div>
            <div class="form-group">
            <label for="post_status">Lastname</label>
            <input type="text" class="form-control" name="lname" >
            </div>
            <!-- <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" name="image">
            </div> -->
            <div class="form-group">
            <label for="post_tags">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $user_email; ?>">
            </div>
            <div class="form-group">
            <label for="post_tags">Password</label>
            <input type="password" class="form-control" name="password">
            </div>

            <div class="form-group">
            <!-- <label for="title">Post title</label> -->
            <input type="submit" class="btn btn-primary" name="submit" value="Update Profile">
            </div>
    </form>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
