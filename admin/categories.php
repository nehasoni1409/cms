
<?php include "includes/admin_header.php"; ?>

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

                    <div class="col-xs-6">
                            <?php
                                if(isset($_POST['submit']))
                                {
                                    $cat_title=$_POST['cat_title'];
                                        if($cat_title == "" || empty($cat_title))
                                        {
                                            echo "<h4>Field should not be empty</h4>";
                                        }
                                        else
                                        {
                                            $query="INSERT INTO `categories` (`cat_title`) VALUES ('$cat_title')";
                                            $result=mysqli_query($connection,$query);
                                            if(!$result)
                                            {
                                                die("query failed".mysqli_error($connection));
                                            }
                                        }
                                }
                            ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input type="text" name="cat_title" class="form-control">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>

                        <?php   
                           if(isset($_GET['edit']))
                           {
                               $cat_id=$_GET['edit'];
                               include "includes/update_categories.php";
                           }
                        ?>
                    </div>
                    <div class="col-xs-6">
                        <?php  
                           $query="SELECT * FROM categories";
                           $select_categories=mysqli_query($connection,$query);
                           if(!$select_categories)
                           {
                               die("query failed".mysqli_error($connection));
                           }
                        ?>
                       <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Category Title</th>
                                   <th>Edit</th>
                                   <th>Delete</th>
                               </tr>
                           </thead>
                           <tbody>
                                <?php
                                     while($row=mysqli_fetch_assoc($select_categories))
                                     {
                                         $cat_id=$row['cat_id'];
                                         $cat_title=$row['cat_title'];
                                         echo "<tr>";
                                         echo "<td>$cat_id</td>";
                                         echo "<td>$cat_title</td>";
                                         echo "<td><a href='categories.php?edit=$cat_id'>Edit</a></td>";
                                         echo "<td><a href='categories.php?delete=$cat_id'>Delete</a></td>";
                                         echo "</tr>";
                                     }
                                ?>
                            </tbody>
                       </table>
                       <?php
                              if(isset($_GET['delete']))
                              {
                                  $delete_id=$_GET['delete'];
                                  $query="DELETE FROM categories WHERE cat_id=$delete_id";
                                  $result=mysqli_query($connection,$query);
                                  if(!$result)
                                  {
                                      die("query failed".mysqli_error($connection));
                                  }
                                header("Location:categories.php");
                              }
                       ?>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
