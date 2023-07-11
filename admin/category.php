<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
            <?php
                include("config.php");
                $limit=2;
                // $offset=  ;
                if (isset($_GET["page"])) {
                    $page=$_GET["page"];
                }else {
                    $page=1;
                }
                $offset=($page - 1)* $limit;
                $SqlforTotalRow="SELECT * FROM category";
                $run4totalrow=mysqli_query($conn,$SqlforTotalRow);
                $total_Page=ceil(mysqli_num_rows($run4totalrow) / $limit) ;
                
                $sql="SELECT * FROM category LIMIT $offset,$limit";
                $run=mysqli_query($conn,$sql);
                if(mysqli_num_rows($run)>0){
                  
            ?>
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php   while($row=mysqli_fetch_assoc($run)){ ?>
                        <tr>
                            <td class='id'><?php echo $row["category_id"];  ?></td>
                            <td><?php echo $row["category_name"];  ?></td>
                            <td><?php echo $row["post"];  ?></td>
                            <td class='edit'><a href='update-category.php'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-category.php'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                    <?php  } ?>    
                    </tbody>
                </table>
                <?php
                }
                if ($total_Page>0) {
                 ?>
                 <ul class='pagination admin-pagination'>
                 <?php   
                        if ($page>1) {
                            echo '<li><a href="category.php?page='.($page-1).'">Prev</a></li>';
                        }
                    for($i=1;$i<=$total_Page;$i++){
                        if($page==$i){ $active="active";}else {$active="";}
                       echo '<li class="'.$active.'"><a href="category.php?page='.$i.'">'. $i .'</a></li>';
                    }
                    if ($page<$total_Page) {
                        echo '<li><a href="category.php?page='.($page+1).'">Next</a></li>';
                    }
                    ?>
                </ul>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
