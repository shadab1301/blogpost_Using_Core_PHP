<?php
    include("config.php");
    $postID=$_GET["postid"];
    $cat_id=$_GET["catId"];

    $sql1="SELECT * FROM post WHERE post_id=$postID";
    $run1=mysqli_query($conn,$sql1) or die("Query Failed : Select");
    $result=mysqli_fetch_assoc($run1);
    $imgName=$result["post_img"];
    unlink("upload/". $imgName);
//   echo "upload/" . $imgName;
//   exit;

    $sql="DELETE  FROM post WHERE post_id=$postID;";
    $sql .="UPDATE category set post=post -1 where category_id=$cat_id";
    // echo $sql;
    // exit;
    $run=mysqli_multi_query($conn,$sql) or die("Query Failed");
    if($run){
       
        header("location:post.php");
    }




?>