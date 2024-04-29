
<?php
include "empdb_connect.php";

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


   <title>Add Employee List</title>
</head>

<body>
   

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;" enctype="multipart/form-data">
            <div class="row mb-3">
               <!-- Sidebar start -->
      <?php include ('sidebar.php'); ?> 
      <!-- Sidebar end -->
      <section id="main-content">
         <!-- header start -->
         <?php include ('header.php'); ?> 
            <!-- header end -->

         <div class="main_contect_body">
                  <div class= "department_tiltle" >
                      Add Department List
                    </div>
                    <?php
                    if (isset($_POST["submit"])) {
                     $name = $_POST['name'];
                     $mobile = $_POST['mobile'];
                     $email = $_POST['email'];
                     $country = $_POST['country'];
                     $designation = $_POST['designation'];
                     $gender = $_POST['gender'];
                  
                     $filename = $_FILES['upfile']['name'];
                     $tmploc = $_FILES['upfile']['tmp_name'];
                     $uploc = "images/" . $filename;
                  
                     // Check if file was uploaded successfully
                     if (move_uploaded_file($tmploc, $uploc)) {
                        $sql = "INSERT INTO `employees`(`id`, `name`, `photo`, `mobile`, `email`, `country`, `designation`, `gender`) VALUES (NULL,'$name','$filename','$mobile','$email','$country','$designation','$gender')";
                  
                        $result = mysqli_query($conn, $sql);
                  
                        if ($result) {
                           header("Location: employee.php?msg=New record created successfully");
                        } else {
                           echo "Failed to insert record: " . mysqli_error($conn);
                        }
                     } else {
                        // Check file upload error
                        echo "File upload failed with error code: " . $_FILES['upfile']['error'];
                     }
                  }
                  ?>


            <div class="col1">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" >
          </div>
         <!-- <div class="co1l">
            <label class="form-label">Photo</label> 
            <input type="text" class="form-control" name="photo" >
         </div> -->
         <div class="mb-3">
                    <label for="photo" class="form-label">Select A Photo</label>
                    <input type="file" class="form-control" name="upfile" id="photo" placeholder=""
                     aria-describedby="fileHelpId" onchange="previewImg(this)"
                    />
                
         <div class="col1">
            <label class="form-label">Mobile No</label>
            <input type="text" class="form-control" name="mobile" >
          </div>
          <div class="col1">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" >
          </div>
          <!-- <div class="col1">
            <label class="form-label">Country</label>
            <input type="text" class="form-control" name="country" >
          </div> -->
          <div class="mb-3">
          <label class="form-label">Country</label>
          <select name="country" class="form-control">
            <option value="bangladesh">Bangladesh</option>
            <option value="Zimbabwe">Zimbabwe</option>
          </select>
        </div>
          <div class="col1">
            <label class="form-label">Designation</label>
            <input type="text" class="form-control" name="designation" >
          </div>

          <!-- <div class="col1">
            <label class="form-label">Gender</label>
            <input type="text" class="form-control" name="gender" style="margin-bottom: 20px;">
          </div> --> <div class="mb-3">
          <label class="form-label">Gender</label>
          <select name="gender" class="form-control">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
         <div>

               <div>
                  <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="" class="btn btn-danger">Back</a>
            </div>
         </form>
      </div>
   </div>
     <!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
crossorigin="anonymous"></script>
<!-- footer start -->
<?php include ('footer.php'); ?> 
<!-- footer end -->

</body>

