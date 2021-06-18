<?php
include("connection.php");
// You can write the code to render for each student's profile here
if(isset($_GET["id"])):
    $id = $_GET["id"];
    // echo "Showing result for id $id";
    $query = "SELECT * FROM tbl_reg_form WHERE id ='$id'";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_fetch_array($result);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Information</title>
    </head>
    <body>
        <div class="container">
            <div id="main-header">
                <header>
                    <h1 id="title">USTACKY</h1>
                    <a href="#" id="span">Home</a>
                    <a href="#" id="header-para">Get Started</a>
                </header>
            </div>
    
            <div id="info-container">
                <div id="profile-image">
                    <img src="#" alt="profile image">
                    <h3><?php echo $rows['firstname'] ." ". $rows["middlename"]." ". $rows["lastname"];?></h3>
                    <p><?php echo $rows['status'];?></p>
                </div>
                <div class="blue-div personal">Personal Information</div>
                <p>Email:<?php echo $rows['email'];?></p>
                <p>Gender:<?php echo $rows['gender'];?></p>
                <p>Phone Number:<?php echo $rows['telephone'];?></p>
                <p>Date Of Birth:<?php echo $rows['dateOfBirth'];?></p>
                <p>Address:<?php echo $rows['address'];?></p>
                <div class="blue-div other">Other Information</div>
                <p>State of Origin:<?php echo $rows['state'];?></p>
                <div class="blue-div academics">Academics related Information</div>
                <p>Next of Kin:<?php echo $rows['kin'];?></p>
                <p>Jamb Score:<?php echo $rows['score'];?></p>
                <input type="checkbox" name="status" id="admission-status" value="$statusquery">Admitted
            </div>
    
            <div id="footer">
                <footer>
                    <p>All right reserved @ustacky 2021</p>
                </footer>
            </div>
    
        </div>
    </body>
    </html>
<?php
endif;
?>