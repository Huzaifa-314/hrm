<?php
include "include/db_connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="style.css"/>

  <title>Department Table Application</title>
</head>

<body>

        <!-- Sidebar start -->
        <?php include ('sidebar.php'); ?> 
        <!-- Sidebar end -->
      <section id="main-content">
            <!-- header start -->
            <?php include ('header.php'); ?> 
            <!-- header end -->
            
            <div class="main_contect_body">
                    <div class= "department_tiltle" >
                        Edit Employee Information
                    </div>

                    <?php
                        include "include/db_connection.php";
                        $id = $_GET["id"]; 

                        if (isset($_POST["submit"])) {
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $NID = $_POST['NID'];
                            $desig_id = $_POST['department_id']; // Get the selected designation ID
                        
                            // Update user information
                            $sql = "UPDATE `users` SET `first_name`='$name', `email`='$email', `NID`='$NID', `desig_id`='$desig_id' WHERE id = $id";
                            $result = mysqli_query($conn, $sql);
                        
                            if ($result) {
                                header("Location: employee.php?msg=User information updated successfully");
                            } else {
                                echo "Failed: " . mysqli_error($conn);
                            }
                        }

                         ?>


                        <div class="container">
                            <div class="text-center mb-4">
                            <h3>Edit User Information</h3>
                            <p class="text-muted">Click update after changing any information</p>
                            </div>

                            <?php
                            $sql = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            ?>

                            <div class="container d-flex justify-content-center">
                            <form action="" method="post" style="width:50vw; min-width:300px;">
                                <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Enter User Name</label>
                                    <input type="text" class="form-control" name="name" style="margin-bottom: 20px;" value="<?php echo $row['first_name'] ?>">
                                </div>
                                <div class="col1">
                                    <label class="form-label">Enter User Email</label>
                                    <input type="text" class="form-control" name="email" style="margin-bottom: 20px;" value="<?php echo $row['email'] ?>">
                                </div>
                                <div class="col2">
                                    <label class="form-label">Enter User NID</label>
                                    <input type="text" class="form-control" name="NID" style="margin-bottom: 20px;" value="<?php echo $row['NID'] ?>">
                                </div>
                                <div class="col3">
                                    <label class="form-label">Select Designation</label>
                                    <select class="form-control mb-3" name="department_id">
                                        
                                        <?php
                                        $desig = mysqli_query($conn, "SELECT * FROM designation");
                                        while ($desig_row = mysqli_fetch_assoc($desig)) {
                                            ?>
                                            <option value="<?php echo $desig_row['id']; ?>" <?php if ($row['desig_id'] == $desig_row['id']) echo "selected"; ?>>
                                                <?php echo $desig_row['name']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                <button type="submit" class="btn btn-primary" name="submit">Update</button>
                                <a href="index.php" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                            </div>
                        </div>




            </div>
       </section>
</body>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
crossorigin="anonymous"></script>
<!-- footer start -->
<?php include ('footer.php'); ?> 
<!-- footer end -->