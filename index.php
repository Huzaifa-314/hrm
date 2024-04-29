<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="style.css"/>

</head>

<body >

        <!-- Sidebar start -->
        <?php include ('sidebar.php'); ?> 
        <!-- Sidebar end -->

       <section id="main-content">
            <!-- header start -->
                <?php include ('header.php'); ?> 
            <!-- header end -->

            <div class="clear"></div>
            <div class="main-content-info container">
                <div class="card-box">
                    <h2 class="cus-num cus-h">10</h2>
                    <p>Departments</p>
                </div>
                <div class="card-box">
                    <h2 class="cus-num cus-pro">5</h2>
                    <p>Projects</p>
                </div>
                <div class="card-box">
                    <h2 class="cus-num cus-ord">2</h2>
                    <p>Leaves</p>
                </div>
                <div class="card-box">
                    <h2 class="cus-num cus-inc">75</h2>
                    <p>Employees</p>
                </div>
                <div class="clear"></div>
            </div>
            <div class="content-pro-par container">
                <div class="pro-table">
                        <div class="recent-pro">
                            <div class="rec-h">
                                <h2>Recent Project</h2>
                                
                            </div>
                            
                           <div class="rec-btn">
                            <button>See All</button>
                                    
                                </div>
                                <div class="clear"></div>
                        </div>
                        
                        <table style="width: 100%;">
                            <tr>
                                <th>Project Title</th>
                                <th> Department</th>
                                <th> Status</th>
                            </tr>
                            <tr>
                                <td>web Development</td>
                                <td>Development team</td>
                                <td>Review</td>
                            </tr>
                            <tr>
                                
                                <td>web Development</td>
                                <td>Development team</td>
                                <td>Review</td>
                            </tr>
                            <tr>
                               
                                <td>web Development</td>
                                <td>Development team</td>
                                <td>Review</td>
                            </tr>
                            <tr>
                                <td>web Development</td>
                                <td>Development team</td>
                                <td>Review</td>
                            </tr>
                            <tr>
                                <td>web Development</td>
                                <td>Development team</td>
                                <td>Review</td>
                            </tr>
                            <tr>
                                <td>web Development</td>
                                <td>Development team</td>
                                <td>Review</td>
                            </tr>
                            <tr>
                                <td>web Development</td>
                                <td>Development team</td>
                                <td>Review</td>
                            </tr>
                            <tr>
                                <td>web Development</td>
                                <td>Development team</td>
                                <td>Review</td>
                            </tr>
                            <tr>
                                <td>web Development</td>
                                <td>Development team</td>
                                <td>Review</td>
                            </tr>
                            
                            </tr>
                        </table>
                    </div>
        </section>
</body>

<!-- footer start -->
<?php include ('footer.php'); ?> 
<!-- footer end -->

