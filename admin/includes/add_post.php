<?php
if(isset($_POST['submit']))
{
    $post_title=mysqli_real_escape_string($connection, $_POST['title']);
    $post_category_id=$_POST['category'];
    $post_user=mysqli_real_escape_string($connection, $_POST['users']);
    $post_status=$_POST['status'];
    $post_image=$_FILES['image']['name'];
    // temporary location defines where to send this after submission of form
    $post_image_temp=$_FILES['image']['tmp_name'];
    $post_tags = mysqli_real_escape_string($connection, $_POST['tags']) ;
    $post_content = mysqli_real_escape_string($connection, $_POST['content']);
    $post_date=date('d-m-y');
   //  $post_comment_count=0;

    move_uploaded_file($post_image_temp,"../images/$post_image");

    $query="INSERT INTO `posts` (`post_category_id`, `post_title`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`,  `post_status`) 
    VALUES ($post_category_id, '$post_title', '$post_user', now(), '$post_image', '$post_content', '$post_tags',  '$post_status')";
    $create_post_query=mysqli_query($connection,$query);
    if(!$create_post_query)
    {
        die("Query Failed".mysqli_error($connection));
    }
    $the_edit_id=mysqli_insert_id($connection);
   //  it will fetch the last created id.
   //  echo "Post Added: <a href='./posts.php'>View posts</a>";
   echo "<p>Post Created. <a href='../post.php?p_id=$the_edit_id'>View posts</a> or <a href='./posts.php'>Edit More Posts</a></p>";
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
       <label for="title">Post Title</label>
       <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
       <label for="post_category"> Category </label>
       <!-- <input type="text" class="form-control" name="category"> -->
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
    <div class="form-group">
       <label for="users"> Users </label>
       
       <select name="users">
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
    <!-- <div class="form-group">
       <label for="post_author">Post Author</label>
       <input type="text" class="form-control" name="author">
    </div> -->
    <div class="form-group">

       <select name="status">
         <option value="draft">Post Status</option>
         <option value="draft">Draft</option>
         <option value="published">Publish</option>
       </select>
    </div>
    <div class="form-group">
       <label for="post_image">Post Image</label>
       <input type="file" name="image">
    </div>
    <div class="form-group">
       <label for="post_tags">Post Tags</label>
       <input type="text" class="form-control" name="tags">
    </div>
    <div class="form-group">
       <label for="post_content">Post Content</label>
       <textarea class="form-control" name="content" id="body" cols="30" rows="10"></textarea>
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
       <input type="submit" class="btn btn-primary" name="submit" value="Publish Post">
    </div>
</form>