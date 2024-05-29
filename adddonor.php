<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bloodbank";

// create connection
$mysqli = new mysqli($servername, $username, $password,$dbname);

if(!$mysqli){
	die("Connection  failed: " . mysqli_connect_error());
}

$donor_name = mysqli_real_escape_string($mysqli, $_POST['donor_name']);
$mobile_no = mysqli_real_escape_string($mysqli, $_POST['mobile_no']);
$bloodgroup = mysqli_real_escape_string($mysqli, $_POST['bloodgroup']);
$age = mysqli_real_escape_string($mysqli, $_POST['age']);
$gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
$address = mysqli_real_escape_string($mysqli, $_POST['address']);
$city = mysqli_real_escape_string($mysqli, $_POST['city']);

if(strlen($donor_name) < 1){
    echo "donor";
} elseif(strlen($mobile_no) < 1){
    echo "mob";
} elseif(strlen($bloodgroup) < 1){
    echo "bg";
} elseif(strlen($age) < 1){
    echo "age";
} elseif(strlen($gender) < 1){
    echo "gender";
} elseif(strlen($address) < 1){
    echo "address";
} elseif(strlen($city) < 1 ){
    echo "city";
} else{
    $query = "SELECT * FROM donors WHERE mobile_no='$mobile_no'";
    $result = mysqli_query($mysqli, $query);
    $num_row = mysqli_num_rows($result);
    if($num_row < 1){
        $insert_row = $mysqli->query("INSERT INTO donors (donor_name, mobile_no, bloodgroup,age,gender,city,address) VALUES ('$donor_name','$mobile_no','$bloodgroup', '$age','$gender','$city','$address')");

        echo "true";
    } else{
        echo "false";
    }

}

$mysqli->close();

?>