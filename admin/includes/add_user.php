<?php
if(isset($_POST['submit']))
{
   
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $user_role=mysqli_real_escape_string($connection, $_POST['role']);
    $user_firstname=mysqli_real_escape_string($connection, $_POST['fname']);
    $user_lastname=mysqli_real_escape_string($connection, $_POST['lname']);

    $user_email=mysqli_real_escape_string($connection, $_POST['email']);
    $user_password=mysqli_real_escape_string($connection, $_POST['password']);

    $password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10) );



    $query="INSERT INTO `users` (`username`, `user_password`,
     `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`) 
    VALUES ('$username', '$password', '$user_firstname', '$user_lastname', '$user_email', '', '$user_role')";
    $create_user_query=mysqli_query($connection,$query);
    if(!$create_user_query)
    {
        die("Query Failed".mysqli_error($connection));
    }
    echo "User Created : " . " " . "<a href='users.php'>View All Users</a>";
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
       <label for="title">Username</label>
       <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <select name="role">
        <option value="subscriber">select options</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
        </select>
    </div>
    <!-- <div class="form-group">

       <select name="role">
           <?php
                 $query="SELECT * FROM users";
                 $result=mysqli_query($connection,$query);
                 while($row=mysqli_fetch_assoc($result))
                 {
                    $user_id=$row['user_id'];
                    $user_role=$row['user_role'];
                    echo "<option value=$user_id>$user_role</option>";
                 }
           ?>
       </select>
    </div> -->
    <div class="form-group">
       <label for="post_author">Firstname</label>
       <input type="text" class="form-control" name="fname">
    </div>
    <div class="form-group">
       <label for="post_status">Lastname</label>
       <input type="text" class="form-control" name="lname">
    </div>
    <!-- <div class="form-group">
       <label for="post_image">Post Image</label>
       <input type="file" name="image">
    </div> -->
    <div class="form-group">
       <label for="post_tags">Email</label>
       <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
       <label for="post_tags">Password</label>
       <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group">
       <!-- <label for="title">Post title</label> -->
       <input type="submit" class="btn btn-primary" name="submit" value="Add User">
    </div>
</form>