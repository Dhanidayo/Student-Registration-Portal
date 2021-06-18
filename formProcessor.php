<?php
//include the database connection file
include("connection.php");
if (isset($_POST['Submit'])) {
    //get the post records
    //Improper image processing
    //file can't be treated as a string
    //$image_file = mysqli_real_escape_string($conn, $_POST['image_file']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $dateOfBirth = mysqli_real_escape_string($conn, $_POST['dateOfBirth']); 
    $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $kin = mysqli_real_escape_string($conn, $_POST['kin']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $lga = mysqli_real_escape_string($conn, $_POST['lga']);
    $score = mysqli_real_escape_string($conn, $_POST['score']);
    
    if (empty($firstname) || empty($lastname) || empty($dateOfBirth) || empty($telephone) || empty($state) || empty($kin) || empty($middlename) || empty($email) || empty($gender) || empty($address) || empty($score)) {
         echo "<font color='red'>Some fields are empty.</font><br>";
    }else{
        //if all fields are filled and not empty
        //database insert sql code
        $sql = "INSERT INTO `tbl_reg_form` (`firstname`, `lastname`, `dateOfBirth`, `telephone`, `state`, `kin`, `middlename`, `email`, `gender`, `address`, `score`)
                VALUES('$firstname', '$lastname', '$dateOfBirth', '$telephone', '$state', '$kin', '$middlename', '$email', '$gender', '$address', '$score');";
        //insert data into the database
        $result = mysqli_query($conn, $sql);
        echo mysqli_error($conn);
        echo "<font color='green'>Registration completed successfully.</font>";
        mysqli_close($conn);
    }
}

?>