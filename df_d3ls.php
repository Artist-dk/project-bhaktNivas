<?php

// $conn = mysqli_connect("localhost","root","","mbnRegisterain");
// if (!$conn) {
//   die("Connection failed: ".mysqli_connect_error());
// }

// // Check if the 'data' parameter is set in the POST request
// if (isset($_POST['data'])) {
//     // Retrieve the JSON data and decode it
//     $jsonData = json_decode($_POST['data'], true);

//     // Check if decoding was successful
//     if ($jsonData !== null) {
//         // Access the data as an associative array
//         // $formData = $jsonData['data'];

//         echo $_POST['data'];
//         print_r( $jsonData );

//         // Process the data as needed
//         // For example, you can access specific form fields like $formData['fieldName']

//         // Send a response (optional)

//         echo json_encode(['status' => 'success', 'message' => 'Data received successfully']);

//     } else {
//         // Handle JSON decoding error
//         echo json_encode(['status' => 'error', 'message' => 'Error decoding JSON data']);
//     }
// } else {
//     // Handle the case when 'data' parameter is not set
//     echo json_encode(['status' => 'error', 'message' => 'No data received']);
// }

?>


<?php
$conn = mysqli_connect("localhost","root","","bnRegister");
if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}
header("Content-Type: application/json; charset=UTF-8");
// $data=json_decode($_POST["data"], true);
$data = $_POST['data'];
$data = json_decode($data,true);
print_r($data);
// $data=trim(mysqli_real_escape_string($conn,$_POST['data']));

$errors = [];



$firstName=strtolower(trim($data['firstName']));
$lastName=strtolower(trim($data['lastName']));
$phone=trim($data['phone']);
$checkin=trim($data['checkin']);
$ac = $data['ac']?1:0;

$re = ['/^[a-zA-Z]+$/','/^\d{10}$/','/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/',/*/^[a-zA-Z0-9]+$/*/'/^[A-Za-z0-9_]{5,20}$/','/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/'];

if(!preg_match($re[0],$firstName))$errors['firstName']='Please enter a valid first name';
if(!preg_match($re[0],$lastName))$errors['lastName']='Please enter a valid last name';
if(!preg_match($re[1],$phone))$errors['phone']='Please enter a valid 10-digit mobile number';


if(!empty($errors)){
  foreach($errors as $error){
    echo'<p>'.$error.'</p>';
  }
} else {
  $sql="INSERT INTO `register` (firstName, lastName, phone, checkin, ac, stat) VALUES ('$firstName','$lastName','$phone','$checkin','$ac',0)";
  echo $sql;
  $result=mysqli_query($conn, $sql);
  // if(isset($_SESSION['recipient_id']) && isset($_SESSION['user_id'])) {
  // }
  // mysqli_free_result($result); 
  $conn->close();
}



function validate($data) {
  // echo $data;
  return $data;
}
?>
