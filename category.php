<?php
include("config.php");

    $catId=$_GET["catId"];
   $sql2="select category_name from category where category_id=$catId ";
   $run2=mysqli_query($conn,$sql2) or die("Query Failed..");
   $data2=mysqli_fetch_assoc($run2);
?>


<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
               
                  <h2 class="page-heading"><?php echo strtoupper($data2["category_name"]) ?></h2>
               
                  
    <!-- Post Content -->
            <?php
                 $sql="SELECT * FROM post 
                 LEFT JOIN user ON post.author=user.user_id
                 LEFT JOIN category ON post.category=category.category_id
                 WHERE post.category=$catId";   
                 $run=mysqli_query($conn,$sql)or die("Query failed");
                 $totalRow=mysqli_num_rows($run);
                 if($totalRow>0){
                     while($data=mysqli_fetch_assoc($run)){
                      
            ?>    
                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href="single.php"><img src="admin/upload/<?php echo $data["post_img"]; ?>" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='single.php?postId=<?php echo $data["post_id"]; ?>'><?php echo $data["title"]; ?></a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='category.php?catId=<?php echo $data["category_id"]; ?>'><?php echo $data["category_name"]; ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href='author.php?userId=<?php echo $data["user_id"]?>&postId=<?php echo $data["post_id"]?>;'><?php echo $data["username"]; ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php echo $data["post_date"]; ?>
                                        </span>
                                    </div>
                                    <p class="description">
                                        <?php echo substr($data["description"],0,200); ?>
                                    </p>
                                    <a class='read-more pull-right' href='single.php?postId=<?php echo $data["post_id"]; ?>'>read more...</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php   }} ?>       
                   
                   
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
