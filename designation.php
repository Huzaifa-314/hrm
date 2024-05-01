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

  <title>Designation Table Application</title>
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
                      Designation Information List
              </div>

  <div class="container">
    <?php
    if (isset ($_GET["msg"])) {
      $msg = $_GET["msg"];
     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    
    <a class="add_department" href="add_designation.php" class="btn btn-primary mb-3"><i class="fa-solid fa-plus"></i>Add New Designation</a>

    <table class="table table-hover text-center">
      <thead class="table-primary">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Department Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $no = 1;
        $sql = "SELECT * FROM `designation`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td>
              <?php echo $no; ?>
            </td>
            <td>
              <?php echo $row["name"] ?>
            </td>
            <td>
              <?php
              // Retrieve the department name based on the department ID
              $department_id = $row["department_id"];
              $department_query = "SELECT name FROM department WHERE id = $department_id";
              $department_result = mysqli_query($conn, $department_query);

              // Check if department name was found
              if (mysqli_num_rows($department_result) > 0) {
                  $department_row = mysqli_fetch_assoc($department_result);
                  ?><span class="badge badge-info"><?php echo $department_row["name"];?></span><?php
              } else {
                  echo "Department not found";
              }
              ?>
          </td>
            <td>
              <a href="edit_designation.php?id=<?php echo $row["id"] ?>" class="link-primary"><i
                  class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
             
              <a href="#<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal<?php echo $row["id"] ?>"></i></a>

              <!-- Modal -->
              <div class="modal fade" id="deleteConfirmModal<?php echo $row["id"];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confirm Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h2>Are You Sure Wants to Delete ??</h2>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                       <a href="delete_designation.php?id=<?php echo $row["id"] ?>" class="btn btn-success">Confirm</i></a>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <?php
          $no++;
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
crossorigin="anonymous"></script>
<!-- footer start -->
<?php include ('footer.php'); ?> 
<!-- footer end -->
</body>

</html>