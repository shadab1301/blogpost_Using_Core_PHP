<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
           <?php  
                include("config.php");
                $limit=2;
                if(isset($_GET['page'])){
                    $page=$_GET['page'];
                }else {
                    $page=1;
                }
                $offset=($page - 1)* $limit;
               $sql="SELECT * FROM user ORDER BY user_id DESC LIMIT {$offset},{$limit}";
            //   exit;
                $run=mysqli_query($conn,$sql) or die("Query Failed");

                if(mysqli_num_rows($run)>0)
                {
           ?>   
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php 
                            while($usersData=mysqli_fetch_assoc($run))
                        {
                        ?>
                          <tr>
                              <td class='id'><?php echo $usersData['user_id'] ?></td>
                              <td><?php echo $usersData['first_name'] . " " . $usersData['last_name'] ?></td>
                              <td><?php echo $usersData['username'] ?></td>
                              <td>
                                    <?php if($usersData['role']==1){echo "Admin";}else{echo "Normal";} ?>
                              </td>
                              <td class='edit'><a href='update-user.php?eId="<?php echo $usersData['user_id'] ?>"'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php?dId="<?php echo $usersData['user_id'] ?>"'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                        <?php } ?>  
                      </tbody>
                  </table>
               <?php }?>
               <?php
                $psql="SELECT * fROM user";
                $prun=mysqli_query($conn,$psql);
                if(mysqli_num_rows($prun) > 0){
                    $totalRecords=mysqli_num_rows($prun);
                    $totalPage=ceil($totalRecords/$limit);
                    // echo $totalPage;
                    echo '  <ul class="pagination admin-pagination">';
                    if ($page > 1) {
                        echo '
                            <li><a href="users.php?page='. ($page - 1) .'">Prev</a></li>
                                ';
                    }
                    for($i=1;$i<=$totalPage;$i++){
                        if ($page==$i) {
                            echo '
                            <li class="active"><a href="users.php?page='. $i. '">' . $i . '</a></li>
                                ';
                        }else {
                            echo '
                            <li><a href="users.php?page='. $i. '">' . $i . '</a></li>
                                ';
                        }
                       
                    }
                    if ($totalPage > $page) {
                        echo '
                            <li><a href="users.php?page='. ($page + 1) .'">Next</a></li>
                                ';
                    }
                }
               ?>
               
                  </ul>
              </div>
          </div>
      </div>
  </div>
