<?php
include "include/db_connection.php";
$id = $_GET["id"];
$sql = "DELETE FROM `users` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: employee.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}