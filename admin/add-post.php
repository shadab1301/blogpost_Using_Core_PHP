<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="./save-post.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" id="desc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <?php
                            include("config.php");
                            $sql="SELECT category_id ,category_name from category";
                            $run=mysqli_query($conn,$sql);
                            $row= mysqli_num_rows($run);
                          ?>
                          <select name="category" class="form-control" required>
                              <option value="" selected> Select Category</option>
                              <?php
                                if($row>0){
                                   echo $row;
                                    while($data=mysqli_fetch_assoc($run)){
                                        // print_r($data);
                                        // echo $data["category_id"];
                                        echo '<option value="'.$data["category_id"].'">'. $data["category_name"] .'</option>';
                                    }
                                }
                                else{
                                    echo "<div class='alert alert-danger'>Query failed </div>";
                                }
                              ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="fileToUpload" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
