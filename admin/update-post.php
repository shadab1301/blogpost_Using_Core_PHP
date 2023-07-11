<?php include "header.php"; ?>
<?php
//   session_start();
  $userid= $_SESSION["user_id"];
  $userRole= $_SESSION["user_role"];
  if($userRole==0){
     include("config.php");
     $postid=$_GET["postid"];
     $sql2="SELECT author FROM post where post_id=$postid";
     $run2=mysqli_query($conn,$sql2) or die("Query Failed : Select Author");
     $authorId=mysqli_fetch_assoc($run2);
     if($userid != $authorId["author"]){
         header("location:post.php");
        // echo $userid . " " . $authorId["author"];
     }
  }
?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
    <?php
        if(isset($_GET["postid"])){
            $postid=$_GET["postid"];
            // echo $postid;
            include("config.php");
            $sql="SELECT post.post_id,post.title,post.description,post.category,
                        post.author,post.post_img,user.username,category.category_name FROM post 
                        LEFT JOIN user ON post.author=user.user_id
                        LEFT JOIN category ON post.category=category.category_id
                        where post.post_id=$postid";
            $run=mysqli_query($conn,$sql) or die("Query Failed");
            // echo mysqli_num_rows($run);
        }
    ?>

        <!-- Form for show edit-->
        <?php 
            if(mysqli_num_rows($run)>0){  
                while($data=mysqli_fetch_assoc($run))
                {          
        ?>
        <form action="save-update-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $data["post_id"];?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="" value="<?php echo $data["title"];?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5"><?php echo $data["description"];?>

                </textarea>
            </div>
            <div class="form-group">
                
                <?php
                    $sql2="SELECT * FROM category";
                    $run2=mysqli_query($conn,$sql2) or die("query failed");
                    $row2= mysqli_num_rows($run2);
                    // exit;
                    if($row2>0){ 
                       
                ?>
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                     <?php while($data2=mysqli_fetch_assoc($run2)) {
                         $cat_id=$data2["category_id"];
                         $category=$data["category"];
                         if($cat_id==$category){
                             $selected="selected";
                         }else{
                             $selected=" ";
                         }

                         echo' <option ' . $selected . ' value="'.$data2["category_id"].'">'. $data2["category_name"] .'</option>';
                     } ?>   
                   
                </select>
                 <?php }?>       
            </div>
            <div class="form-group">
            <?php $img= $data["post_img"];?>
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?php echo $img; ?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo $img; ?>">
            </div>
            <input type="hidden" name="old_category" value="<?php echo $data['category']; ?>">
            <input type="submit" name="update_Post" class="btn btn-primary" value="Update" />

        </form>
        <?php } } ?>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
