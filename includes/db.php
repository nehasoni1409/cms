
<?php
$connection=mysqli_connect('localhost','root','','cms');
if($connection)
{
    // echo "we are connected";
}
else
{
    die("failed to connect".mysqli_error($connection));
}
?>