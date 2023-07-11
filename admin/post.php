<?php include "header.php"; //session_start();?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
              <?php
                include("config.php");
                if(isset($_GET["page"])){
                    $page=$_GET["page"];
                }else{
                    $page=1;
                }
                $limit=2;
                $offset=($page-1)* $limit;
                $sql4Pagination="SELECT * FROM post";
                $run4Pagination=mysqli_query($conn,$sql4Pagination);
                $toatalRow= mysqli_num_rows($run4Pagination);
                $totalPage=ceil($toatalRow/$limit);
                if(isset($_GET["page"])){
                    $page=$_GET["page"];
                }
                else{$page=1;}
                    if($_SESSION["user_role"]==1){
                        $sql="SELECT post.post_id,post.title,post.description,post.category,post.post_date,
                            post.author,post.post_img,user.username,category.category_name FROM post 
                        LEFT JOIN user ON post.author=user.user_id
                        LEFT JOIN category ON post.category=category.category_id
                        order by post.post_id DESC limit $offset,$limit";
                        $run=mysqli_query($conn,$sql) or die("Query Failed");
                    }elseif($_SESSION["user_role"]==0){
                        $sql="SELECT post.post_id,post.title,post.description,post.category,post.post_date,
                            post.author,post.post_img,user.username,category.category_name FROM post 
                        LEFT JOIN user ON post.author=user.user_id
                        LEFT JOIN category ON post.category=category.category_id
                        where post.author={$_SESSION["user_id"]}
                        order by post.post_id DESC limit $offset,$limit";
                        $run=mysqli_query($conn,$sql) or die("Query Failed");
                    }
                if(mysqli_num_rows($run)>0){
              ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php
                        while($data=mysqli_fetch_assoc($run)){
                            
                      ?>
                          <tr>
                            <td class='id'><?php echo $data["post_id"] ?></td>
                            <td><?php echo $data["title"] ?></td>
                            <td><?php echo $data["category_name"] ?></td>
                            <td><?php echo $data["post_date"] ?></td>
                            <td><?php echo $data["username"] ?></td>
                            <td class='edit'><a href='update-post.php?postid=<?php echo $data["post_id"] ?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-post.php?postid=<?php echo $data["post_id"]?>& catId=<?php echo $data["category"];?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                     <?php   } ?>
                      
                      </tbody>
                  </table>
               <?php } 
               
               ?>
                  <ul class='pagination admin-pagination'>
                  <?php 
                  if($page>1){
                    echo'<li class=""><a href="post.php?page='. ($page - 1) .'">Prev</a></li>';
                    }
                    for($i=1;$i<=$totalPage;$i++){
                        if($i==$page){$active="active";}else{$active="";}
                        
                        echo'<li class="'.$active.'"><a href="post.php?page='. $i .'">'. $i .'</a></li>';
                    }
                    if($page<$totalPage){
                        echo'<li class="'.$active.'"><a href="post.php?page='. ($page + 1) .'">Next</a></li>';
                    }
                  ?>
                     
                      <!-- <li><a>2</a></li>
                      <li><a>3</a></li> -->
                  </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
