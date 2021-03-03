<?php
if(isset($_GET['p_id']))
{
    $the_edit_id=$_GET['p_id'];
    $query="SELECT * FROM users WHERE user_id=$the_edit_id";
    $result=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($result))
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
if(isset($_POST['submit']))
{
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $user_role = mysqli_real_escape_string($connection, $_POST['role']);
    $user_firstname = mysqli_real_escape_string($connection, $_POST['fname']);
    $user_lastname = mysqli_real_escape_string($connection, $_POST['lname']);
    $user_email = mysqli_real_escape_string($connection, $_POST['email']);
    $user_password = mysqli_real_escape_string($connection, $_POST['password']);

    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

    $query="UPDATE `users` SET `username` = '$username', `user_password` = '$hashed_password',
     `user_firstname` = '$user_firstname', `user_lastname` = '$user_lastname', 
     `user_email` = '$user_email', `user_role` = '$user_role' 
     WHERE `users`.`user_id` = $the_edit_id";
    $update_user_query=mysqli_query($connection,$query);
    if(!$update_user_query)
    {
        die("Querry failed!".mysqli_error($connection));
    }
}
?>
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
       <input type="text" class="form-control" name="fname" value="<?php echo $user_firstname; ?>">
    </div>
    <div class="form-group">
       <label for="post_status">Lastname</label>
       <input type="text" class="form-control" name="lname" value="<?php echo $user_lastname; ?>">
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
       <input type="submit" class="btn btn-primary" name="submit" value="Update User">
    </div>
</form>