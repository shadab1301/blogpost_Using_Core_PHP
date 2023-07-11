<?php
    if(isset($_POST["submit"])){
        include("config.php");
        if(isset($_FILES["fileToUpload"])){
            
            $fileforUpload=$_FILES["fileToUpload"];
            $fileName=$_FILES["fileToUpload"]["name"];
            $tmp_name=$_FILES["fileToUpload"]["tmp_name"];
            $type=$_FILES["fileToUpload"]["type"];
            $size=$_FILES["fileToUpload"]["size"];
            $explode=explode(".",$fileName);
            $extension=strtolower(end($explode));
            $errors=array();
            $allowedExtension=array("jpg","jpeg","png");
              
            if($size > 2097152){
              $errors[]="File size should be less than or equal to 2MB...";
            }
            if(in_array($extension,$allowedExtension)===false){
              $errors[]="This extension file not allowed, Please choose a JPG or PNG file.";
            }
            $newname=time()."-".basename($fileName) ;
            $target="upload/" .$newname;
            if(empty($errors)===true){
              move_uploaded_file($tmp_name,$target);
            }else{
              print_r($errors);
            }
        }
        else{
            $array[]="File Selection is mandetory...";
        }
        session_start();
            $title=mysqli_real_escape_string($conn, $_POST["post_title"]);
            $postdesc=mysqli_real_escape_string($conn, $_POST["postdesc"]);
            $category=mysqli_real_escape_string($conn, $_POST["category"]);
            $date=date("d-M-y");
            $author=  $_SESSION["user_id"];
            $sql="INSERT INTO post(title,description,category,post_date,author,post_img)
                            VALUES('$title','$postdesc',$category,'$date',$author,'$newname');";
            $sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$category}";                 
            $run=mysqli_multi_query($conn,$sql);
            if($run){
                header("location:post.php");
            }else{
              echo "Query Failed";
            }                
    }



?>