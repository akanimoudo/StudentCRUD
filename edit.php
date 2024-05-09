<?php include('header.php'); include('dbcon.php'); ?>

    
    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM `student` WHERE id = $id";
            $result = mysqli_query($connection,$query);
            if(!$result){
                die("Query Failed".mysqli_error($connection));
            }
            else{
                $row = mysqli_fetch_assoc($result);
            }
        }
    ?>
    <?php
        if(isset($_POST['update_student'])){
            if(isset($_GET['id_new'])){
                $idnew = $_GET['id_new'];
            }
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $age = $_POST['age'];
            $query = "UPDATE `student` SET `first_name`='$first_name',`last_name`='$last_name',`age`='$age' WHERE id = $idnew";
            $result = mysqli_query($connection,$query);

            if(!$result){
                die("Query Failed".mysqli_error($connection));
            }
            else{
                header('location:index.php?update_msg=Your data has been updated successfully');
            }
        }
    ?>


    <form action="edit.php?id_new = <?php echo $id;?>" method="POST" class="modal-body">
        <input type="text" placeholder="First Name" name="first_name" value="<?php echo $row['first_name']?>" name="first_name"/><br>
        <input type="text" placeholder="Last Name" name="last_name" value="<?php echo $row['last_name']?>" name="last_name"/>
        <input type="number" placeholder="input your age" name="age" value="<?php echo $row['age']?>" name="age"/>
        <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <input type="submit" class="btn btn-primary" value="Update" name="update_student">
        </div>
    </form>
    <?php include('footer.php');?>
