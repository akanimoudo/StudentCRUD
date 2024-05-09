<?php include('header.php');?>
<?php include("dbcon.php");?> 
                <button type="button" class="btn btn-primary ps-5 ms-5" data-toggle="modal" data-target="#exampleModal">Add Student</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                   
                <form action="form_data.php" method="post" class="modal-body">
                    <input type="text" placeholder="First Name" name="first_name"><br>
                    <input type="text" placeholder="Last Name" name="last_name">
                    <input type="number" placeholder="input your age" name="age">
                    <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <input type="submit" class="btn btn-primary" value="Add" name="add_student">
                </div>
                </form>
                
                </div>
            </div>
            </div>


            <?php  if(isset($_GET['message'])){
                        echo "<h3>".$_GET['message'];
                    }
                        ?>
                        <?php if(isset($_GET['nolastname'])){echo "<h2>".$_GET['nolastname'];}?>
                        <?php if(isset($_GET['noage'])){echo "<h2 style: color='red'>".$_GET['noage'];}?>
                        <?php if(isset($_GET['insert_msg'])){echo "<h2>".$_GET['insert_msg'];}?>
                        <?php if(isset($_GET['update_msg'])){echo '<h3>'.$_GET['update_msg'];} ?>
            
        <table class="table table-bordered table-striped">
            <thead>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                <?php 
                $query = "SELECT * FROM student";

                $result = mysqli_query($connection,$query);
                if(!$result){
                    die("Query Failed".mysqli_error($connection));
                }
                else{
                    while($row = mysqli_fetch_assoc($result)){
                        //echo "<tr>";
                        // echo "<td>".$row['id']."</td>";
                        // echo "<td>".$row['first_name']."</td>";
                        // echo "<td>".$row['last_name']."</td>";
                        // echo "<td>".$row['age']."</td>";
                        // echo "</tr>";
                        ?>
                        <tr>
                            <td> <?php echo $row['id'] ?></td>
                            <td> <?php echo $row['first_name'] ?></td>
                            <td> <?php echo $row['last_name'] ?></td>
                            <td> <?php echo $row['age'] ?></td>
                            <td> <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-primary">Edit</a></td>
                            <td> <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        
                        <?php
                    }
                }
                ?>
            </tbody>            
       
            <!-- <div class="modal" tabindex="-1" role="dialog"> -->
        
        </table>
   <?php include('footer.php');?>
    