<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php
// // the message
// $msg = "First line of text\nSecond line of text";

// // use wordwrap() if lines are longer than 70 characters
// $msg = wordwrap($msg,70);

// // send email
// mail("sonineha14092000@gmail.com","My subject",$msg);
  if(isset($_POST['submit']))
{

      $to = "sonineha14092000@gmail.com";
      $subject=$_POST['subject'];
      $body=$_POST['body'];

}
?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                    <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                        <!-- <h6 class="text-center"><?php echo $message; ?></h6> -->

                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter subject">
                        </div>
                         <div class="form-group">
                           
                            <textarea name="body" id="body" class="form-control" cols="50" rows="10"></textarea>
                            <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
