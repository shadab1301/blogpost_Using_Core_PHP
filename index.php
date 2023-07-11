<?php 
    include("config.php");
    include("header.php");
    $psql="SELECT * fROM post";
    $prun=mysqli_query($conn,$psql);
    $totalRecords=mysqli_num_rows($prun);
    $limit=2;
    $totalPage=ceil($totalRecords/$limit);
    if(isset($_GET["pagination"])) {
        $pageNumebr=$_GET["pagination"];
    }else{
        $pageNumebr=1;
    }
 
    $offset=($pageNumebr-1)* $limit;

?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                    <?php
                        $sql="SELECT * FROM post 
                                    LEFT JOIN  user ON post.author=user.user_id
                                    LEFT JOIN category ON    post.category=category.category_id limit $offset,$limit";                 
                        $run=mysqli_query($conn,$sql) or die("Query Failed");
                        
                        while($data=mysqli_fetch_assoc($run)){
                            //  echo $data["username"] ;
                            // echo"<pre>";
                            // print_r($data);
                            // echo"</pre>";
                            // exit;
                      
                    
                    
                    ?>
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php"><img src="admin/upload/<?php echo $data["post_img"]  ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?postId=<?php echo $data["post_id"]  ?>'><?php echo $data["title"]  ?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?catId=<?php echo $data["category_id"]; ?>'><?php echo $data["category_name"]  ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php?userId=<?php echo $data["user_id"]?>&postId=<?php echo $data["post_id"]?>;'><?php echo $data["username"]  ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $data["post_date"]  ?>
                                            </span>
                                        </div>
                                        <p class="description">
                                            <?php echo substr($data["description"],0,200)  ?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?postId=<?php echo $data["post_id"]  ?>'>read more...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php   } ?>        
                        
                        
                        
                        
                        <ul class='pagination'>
                        <?php
                            if ($pageNumebr > 1) {
                                echo '
                                    <li><a href="index.php?pagination='. ($pageNumebr - 1) .'">Prev</a></li>
                                        ';
                            }
                        ?>
                        <?php for($i=1;$i<=$totalPage;$i++){ 
                            if ($i==$pageNumebr) {
                                $active="active";
                            }else{
                                $active="";
                            }
                           echo '<li class="'.$active.'"><a href="index.php?pagination='.$i.'">'.$i.'</a></li>';
                        }?>
                         <?php
                            if ($pageNumebr < $totalPage) {
                                echo '
                                    <li><a href="index.php?pagination='. ($pageNumebr + 1) .'">Next</a></li>
                                        ';
                            }
                        ?>
                        </ul>
                    </div><!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
