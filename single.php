<?php include 'header.php'; ?>

    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                  <?php
                        include("config.php");
                        $postId=$_GET["postId"];
                        $sql="SELECT * FROM post 
                                    LEFT JOIN  user ON post.post_id=user.user_id
                                    LEFT JOIN category ON    post.category=category.category_id
                                    WHERE post_id=$postId";                 
                        $run=mysqli_query($conn,$sql) or die("Query Failed");
                        
                        while($data=mysqli_fetch_assoc($run)){
                    ?>
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3><?php echo $data["title"]; ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?php echo $data["category_name"]; ?>
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
                            <img class="single-feature-image" src="admin/upload/<?php echo $data["post_img"]; ?>" alt=""/>
                            <p class="description">
                                <?php echo $data["description"]; ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>    
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
