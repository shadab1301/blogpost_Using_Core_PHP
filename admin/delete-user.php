<?php
    if(isset($_GET["dId"])){
        $del_id=$_GET["dId"];
        include("config.php");
        $sql="delete  from user where user_id={$del_id}";
        
        $run=mysqli_query($conn,$sql);
        if($run){
            header("location:users.php");
        }else{
            echo "Query failed";
        }


        


    }

?>