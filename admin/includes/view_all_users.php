<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Admin</th>
                                <th>Subscriber</th>
                                <!-- <th>Date</th> -->
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                               $query="SELECT * FROM users";
                               $select_users_query=mysqli_query($connection,$query);
                               if(!$select_users_query)
                               {
                                   die("Query failed!".mysqli_error($connection));
                               }
                               while($row=mysqli_fetch_assoc($select_users_query))
                               {
                                   $user_id=$row['user_id'];
                                   $username=$row['username'];
                                   $user_password=$row['user_password'];
                                   $user_firstname=$row['user_firstname'];
                                   $user_lastname=$row['user_lastname'];
                                   $user_email=$row['user_email'];
                                   $user_image=$row['user_image'];
                                   $user_role=$row['user_role'];
                                //    $post_date=$row['post_date'];

                                   echo "<tr>";
                                   echo "<td>$user_id</td>";
                                   echo "<td>$username</td>";
                                   echo "<td>$user_firstname</td>";
                                    //  $query="SELECT * FROM categories WHERE cat_id=$post_category_id";
                                    //  $result=mysqli_query($connection,$query);
                                    //  while($row=mysqli_fetch_assoc($result))
                                    //  {
                                    //      $cat_title=$row['cat_title'];
                                    //      echo "<td>$cat_title</td>";
                                    //  }
                                   
                                   echo "<td>$user_lastname</td>";
                                //    echo "<td><img class='img-responsive' width=70 height=50 src='../images/$post_image'></td>";
                                    
                                   echo "<td>$user_email</td>";
                                   echo "<td>$user_role</td>";
                                   echo "<td><a href='users.php?admin={$user_id}'>Admin</a></td>";
                                   echo "<td><a href='users.php?subscriber={$user_id}'>Subscriber</a></td>";
                                   echo "<td><a href='users.php?source=edit_user&p_id={$user_id}'>Edit</a></td>";
                                   echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                                   echo "</tr>";
                               }
                            ?>
                        </tbody>
                        <?php
                            if(isset($_GET['delete']))
                            {
                                if(isset($_SESSION['user_role']))
                                {
                                    if($_SESSION['user_role'] == 'admin')
                                    {
                                        $delete_id = mysqli_real_escape_string($connection, $_GET['delete']);
                                        $query="DELETE FROM users WHERE user_id=$delete_id";
                                        $delete_query=mysqli_query($connection,$query);
                                        if(!$delete_query)
                                        {
                                            die("Query Failed".mysqli_error($connection));
                                        }
                                        header("Location:users.php");
                                    }
                                }

                            }

                            if(isset($_GET['admin']))
                            {
                                $admin_id=$_GET['admin'];
                                $query="UPDATE users SET user_role='admin' WHERE user_id=$admin_id";
                                $admin_query=mysqli_query($connection,$query);
                                if(!$admin_query)
                                {
                                    die("Query Failed".mysqli_error($connection));
                                }
                                header("Location:users.php");
                            }

                            if(isset($_GET['subscriber']))
                            {
                                $subscriber_id=$_GET['subscriber'];
                                $query="UPDATE users SET user_role='subscriber' WHERE user_id=$subscriber_id";
                                $subscriber_query=mysqli_query($connection,$query);
                                if(!$subscriber_query)
                                {
                                    die("Query Failed".mysqli_error($connection));
                                }
                                header("Location:users.php");
                            }
                        ?>
</table>