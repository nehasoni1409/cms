<?php
    if(isset($_GET['p_id']))
    {
        $the_edit_id=$_GET['p_id'];
    }
        $query="SELECT * FROM posts WHERE post_id=$the_edit_id";
        $select_posts_by_id=mysqli_query($connection,$query);
        if(!$select_posts_by_id)
        {
            die("Query failed!".mysqli_error($connection));
        }
        while($row=mysqli_fetch_assoc($select_posts_by_id))
        {
            $post_id=$row['post_id'];
            $post_user=$row['post_user'];
            $post_title=$row['post_title'];
            $post_category_id=$row['post_category_id'];
            $post_status=$row['post_status'];
            $post_image=$row['post_image'];
            $post_tags=$row['post_tags'];
            $post_comment_count=$row['post_comment_count'];
            $post_date=$row['post_date'];
            $post_content=$row['post_content'];
        }

    if(isset($_POST['update']))
    {
        $post_title=mysqli_real_escape_string($connection, $_POST['title']);
        $post_category_id=mysqli_real_escape_string($connection, $_POST['category']);
        $post_user=mysqli_real_escape_string($connection, $_POST['users']);
        $post_status=mysqli_real_escape_string($connection, $_POST['status']);
        $post_image=$_FILES['image']['name'];
        // temporary location defines where to send this after submission of form
        $post_image_temp=$_FILES['image']['tmp_name'];
        $post_tags=mysqli_real_escape_string($connection, $_POST['tags']);
        $post_content=mysqli_real_escape_string($connection, $_POST['content']);
        $post_date=date('d-m-y');
        $post_comment_count=4;
    
        move_uploaded_file($post_image_temp,"../images/$post_image");

        if(empty($post_image))
        {
            $query="SELECT * FROM posts WHERE post_id=$the_edit_id";
            $select_image=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($select_image))
            {
                $post_image=$row['post_image'];
            }
        }

        $query="UPDATE `posts` SET `post_category_id` = '$post_category_id',
        `post_title` = '$post_title', `post_user` = '$post_user', 
        `post_date` = now(), `post_image` = '$post_image',
        `post_content` = '$post_content', `post_tags` = '$post_tags',
         `post_comment_count` = '$post_comment_count', 
        `post_status` = '$post_status' WHERE `posts`.`post_id` = $the_edit_id;";
        $update_query=mysqli_query($connection,$query);
        if(!$update_query)
        {
            die("Query failed!".mysqli_error($connection));
        }
        echo "<p>Post Updated. <a href='../post.php?p_id=$the_edit_id'>View posts</a> or <a href='./posts.php'>Edit More Posts</a></p>";
    }
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
       <label for="title">Post Title</label>
       <input type="text" class="form-control" name="title" value=<?php echo $post_title; ?>>
    </div>
    <div class="form-group">
    <label for="category">Category</label>
       <select name="category">
           
           <?php
               $query="SELECT * FROM categories";
               $result=mysqli_query($connection,$query);
               while($row=mysqli_fetch_assoc($result))
               {
                   $cat_id=$row['cat_id'];
                   $cat_title=$row['cat_title'];
                   echo "<option value=$cat_id>$cat_title</option>";
               }
           ?>
       </select>
    </div>
    <!-- <div class="form-group">
       <label for="post_author">Post Author</label>
       <input type="text" class="form-control" name="author" value=<?php echo $post_author; ?>>
    </div> -->
    <div class="form-group">
       <label for="users"> Users </label>
       
       <select name="users">
       <option value='<?php echo $post_user; ?>'><?php echo $post_user; ?></option>
           <?php
                 $query="SELECT * FROM users";
                 $result=mysqli_query($connection,$query);
                 while($row=mysqli_fetch_assoc($result))
                 {
                    $user_id=$row['user_id'];
                    $username=$row['username'];
                    echo "<option value='$username'>$username</option>";
                 }
           ?>
       </select>
    </div>
    <div class="form-group">
       
       <select name="status">
           <option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>
           <?php
               if($post_status == 'draft')
               {
                   echo "<option value='published'>Publish</option>";

               }
               else
               {
                   echo "<option value='draft'>Draft</option>";
               }
           ?>

       </select>
    </div>
    <div class="form-group">
       <!-- <label for="post_image">Post Image</label> -->
       <img width=100 src="../images/<?php echo $post_image; ?>" alt="">
       <input type="file" name="image">
    </div>
    <div class="form-group">
       <label for="post_tags">Post Tags</label>
       <input type="text" class="form-control" name="tags" value=<?php echo $post_tags; ?>>
    </div>
    <div class="form-group">
       <label for="post_content">Post Content</label>
       <textarea class="form-control" name="content" id="body" cols="30" rows="10"><?php echo $post_content;  ?></textarea>
       <script>
            ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
       </script>
    </div>
    <div class="form-group">
       <!-- <label for="title">Post title</label> -->
       <input type="submit" class="btn btn-primary" name="update" value="Update Post">
    </div>
</form>