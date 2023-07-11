
<?php
include("config.php");
  $pageName= basename($_SERVER["PHP_SELF"]);
//   echo $pageName;
//   die();
  switch($pageName){
      case "single.php" : 
            if(isset($_GET["postId"])){
                $postId=$_GET["postId"];
                $sql2="SELECT title from post where post_id=$postId";
                $run2=mysqli_query($conn,$sql2) or die("Query Failed : Select Title");
                $row_title=mysqli_fetch_assoc($run2);
                $title=$row_title["title"];
                // echo $title;

            }else{
                $title="No post found";
            }
            break;
       
      case "category.php" :
           
            if(isset($_GET["catId"])){
                $catId=$_GET["catId"];
                $sql2="SELECT category_name from category where category_id=$catId";
                $run2=mysqli_query($conn,$sql2) or die("Query Failed : Select Title");
                $row_title=mysqli_fetch_assoc($run2);
                $title=$row_title["category_name"];
                // echo $title;

            }else{
                $title="No post found";
            }
            break;   
    
      case "author.php" :      
            if(isset($_GET["userId"])){
                $userId=$_GET["userId"];
                $sql2="SELECT username from user where user_id=$userId";
                $run2=mysqli_query($conn,$sql2) or die("Query Failed : Select Title");
                $row_title=mysqli_fetch_assoc($run2);
                $title="News br : " .  $row_title["username"];
                // echo $title;

            }else{
                $title="No post found";
            }
            break; 
            
        case "search.php" :      
            if(isset($_GET["search"])){
                $search=$_GET["search"];
                $title="News by " . $search;
                // echo $title;

            }else{
                $title="No search result found";
            }
            break;     




      default:      
                $title="News Site";
                break;
  }


?>






<?php
    $sql="SELECT * FROM category where post > 0";
    $run=mysqli_query($conn,$sql) or die("Query faile:Header Select");
    $totalRows=mysqli_num_rows($run);
    // echo $totalRows;
    if (isset($_GET["catId"])) {
        $catId=$_GET["catId"];
    }
    $active="";
    
   
    
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php  echo $title;  ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/news.jpg"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
    <?php
        // if (mysqli_num_rows($run)>0) {
    ?>
        <div class="row">
            <div class="col-md-12">
                <?php if ($totalRows>0) {  ?>
                <ul class='menu'>
                <li><a href="<?php echo $hostname ?>">Home</a></li>
                <?php while($data=mysqli_fetch_assoc($run)){ 
                     if(isset($_GET['catId'])){
                        if($data['category_id'] == $catId){
                          $active = "active";
                        }else{
                          $active = "";
                        }
                      }
                ?>
                    <li><a class='<?php echo $active;?>' href='category.php?catId=<?php echo $data["category_id"]; ?>'><?php echo $data["category_name"]; ?></a></li>
                <?php } ?>  
                </ul>
              <?php } ?>          
            </div>
        </div>
 
    </div>
</div>
<!-- /Menu Bar -->

