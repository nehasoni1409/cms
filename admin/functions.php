<?php ob_start(); ?>
<?php
function placeholder($image)
{
    if(!isset($image))
    {
        return 'php.png';
    }
    else
    {
        return $image;
    }
}
function redirect($location){

    global $connection;
    header("Location:" . $location);
    // instead of returning you can use exit function
    exit;

}
function ifItIsMethod($method)
{
    if($_SERVER['REQUEST_METHOD'] == strtoupper($method))
    {
        return true;
    }
    else
    {
        return false;
    }
}
function isLoggedIn()
{
    if(isset($_SESSION['user_role']))
    {
        return true;
    }
    else
    {
        return false;
    }
}
function checkIfUserIsLoggedInAndRedirect($redirectLocation = null)
{
    if(isLoggedIn())
    {
        redirect($redirectLocation);
    }
}
function escape($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
}
// those users_role is set to admin that only can acces the users.php page
function is_admin($username)
{
    global $connection;
    $query="SELECT user_role FROM users WHERE username = '$username'";
    $result=mysqli_query($connection,$query);
    if(!$result)
    {
        die("query failed".mysqli_error($connection));
    }
    $row=mysqli_fetch_assoc($result);
    if($row['user_role']=='admin')
    {
        return true;
    }
    else
    {
        return false;
    }
}

function username_exist($username)
{
    global $connection;
    $query="SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($connection,$query);
    if(!$result)
    {
        die("query failed".mysqli_error($connection));
    }
    if(mysqli_num_rows($result)>1)
    {
        return true;
    }
    else{
        return false;
    }

}
function email_exist($email)
{
    global $connection;
    $query="SELECT user_email FROM users WHERE user_email = '$email'";
    $result = mysqli_query($connection,$query);
    if(!$result)
    {
        die("query failed".mysqli_error($connection));
    }
    if(mysqli_num_rows($result)>0)
    {
        return true;
    }
    else{
        return false;
    }

}

function register_user($username,$email,$password)
{
    global $connection;
    




      $username=mysqli_real_escape_string($connection,$username);
      $email=mysqli_real_escape_string($connection,$email);
      $password=mysqli_real_escape_string($connection,$password);




      $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
      $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
      $query .= "VALUES('$username', '$email', '$password', 'subscriber' )";
      $register_user_query=mysqli_query($connection,$query);
      if(!$register_user_query)
      {
          die("query failed".mysqli_error($connection));
      }
      // $message = "your registration has been submitted";
    


}
function login_users($username,$password)
{
    global $connection;
    $username = trim($username);
    $password = trim($password);
    
    $username=mysqli_real_escape_string($connection,$username);
    $password=mysqli_real_escape_string($connection,$password);

    $query="SELECT * FROM users WHERE username='$username' ";
    $select_user_query=mysqli_query($connection,$query);
    if(!$select_user_query)
    {
        die("Query failed".mysqli_error($connection));
    }
    while($row=mysqli_fetch_assoc($select_user_query))
    {
       $db_user_id=$row['user_id'];
       $db_username=$row['username'];
       $db_user_password=$row['user_password'];
       $db_user_firstname=$row['user_firstname'];
       $db_user_lastname=$row['user_lastname'];
       $db_user_role=$row['user_role'];


       if(password_verify($password,$db_user_password))
       {
           $_SESSION['username'] = $db_username;
           $_SESSION['firstname'] = $db_user_firstname;
           $_SESSION['lastname'] = $db_user_lastname;
           $_SESSION['user_role'] = $db_user_role;
   
   
           redirect("/cms/admin");
       }
     
       else
       {
         
         return false;
       }
       
    }
    
   return true;
}

?>