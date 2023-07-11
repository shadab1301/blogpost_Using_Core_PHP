
<!-- Update user -->
<?php
    if(isset($_POST["updateuserData"])){
        include("config.php");
        $user_id=mysqli_real_escape_string($conn,$_POST["user_id"]);
        $fname=mysqli_real_escape_string($conn,$_POST["f_name"]);
        $lname=mysqli_real_escape_string($conn,$_POST["l_name"]);
        $userName=mysqli_real_escape_string($conn,$_POST["username"]);
        // $password=mysqli_real_escape_string($conn,md5($_POST["password"]));
        $role=mysqli_real_escape_string($conn,$_POST["role"]);

        $sql="update user set first_name='$fname',last_name='$lname',username='$userName',role='$role' WHERE user_id='{$user_id}'";
       
        $run=mysqli_query($conn,$sql) or die("Query Failed");
        // echo $run;
        // exit;
        if($run==1)
        {
            header("location:users.php");
        }
        else{
            echo "Data Not updatted successfully...";
            
        }

    }

?>



<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
              <?php 
                include("config.php");
                $editId=$_GET["eId"];
                $sql="select * from user where user_id=$editId";

                $run=mysqli_query($conn,$sql);
                
                if(mysqli_num_rows($run)>0){
                    while($data=mysqli_fetch_assoc($run)){
               
              
              ?>
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER["PHP_SELF"]; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $data["user_id"]; ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $data["first_name"]; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $data["last_name"]; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $data["username"]; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $data['role']; ?>">
                            <?php
                             
                                if($data['role']==1){
                                    echo '<option value="0" >normal User</option>
                                        <option value="1" selected>Admin</option>';
                                }else{
                                    echo '<option value="0" selected>normal User</option>
                                        <option value="1" >Admin</option>';
                                }
                            ?>
                            
                          </select>
                      </div>
                      <input type="submit" name="updateuserData" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
            <?php
                   
                }
            }
            ?>      
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
