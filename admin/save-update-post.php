<?php
    if(isset($_POST["update_Post"])){
        include("config.php");
        $imgName=$_FILES["new-image"]["name"];
        $tempName=$_FILES["new-image"]["tmp_name"];
        $size=$_FILES["new-image"]["size"];
        $extension=explode(".",$imgName);
        $extension=strtolower(end($extension));
        $allowedExtension=array("jpg","jpeg","png");
        $newfileName=time()."-".basename($imgName);
       $oldImg=$_POST["old-image"];
    //    echo "upload/". $oldImg;exit;
        $imgLocation="upload/".$newfileName;
        
        $errors=array();
        if($size>2097152){
            $errors[]="File size should be less than 2 MB";
        }
        if(in_array($extension,$allowedExtension)===false){
            $errors[]="This extension file not allowed, Please choose a JPG or PNG file...";
        }
        if(empty($errors)===true){
           
            move_uploaded_file($tempName,$imgLocation);
            // unlink("admin/upload/".$oldImg);
        }
        else{
            print_r($errors);
            die();
        }
      
        $post_id=$_POST["post_id"];
        $post_title=$_POST["post_title"];
        $postdesc=$_POST["postdesc"];
        $category=$_POST["category"];
        $oldCat=$_POST['old_category'];
        // echo $oldCat;
        // exit;
        $date=date("d-m-y");
        session_start();
        $author_id=$_SESSION["user_id"];
        $sql = "UPDATE post SET title='$post_title',description='$postdesc',category=$category,post_img='$newfileName'
        WHERE post_id=$post_id;";
        if($oldCat != $category ){
        $sql .= "UPDATE category SET post= post - 1 WHERE category_id = $oldCat;";
        $sql .= "UPDATE category SET post= post + 1 WHERE category_id = $category";
        }
        // echo $sql;exit;
        $run = mysqli_multi_query($conn,$sql) or die("Query Failed...xxx");

        if($run){
            header("location:post.php");
        }                         
            
    }



?>