

<?php

// // Check if the 'data' parameter is set in the POST request
// if (isset($_POST['data'])) {
//     // Retrieve the JSON data and decode it
//     $jsonData = json_decode($_POST['data'], true);

//     // Check if decoding was successful
//     if ($jsonData !== null) {
//         // Access the data as an associative array
//         // $formData = $jsonData['data'];

//         echo $_POST['data'];

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
    $conn = mysqli_connect("localhost","root","","main");
    if (!$conn) {
      die("Connection failed: ".mysqli_connect_error());
    }
    $data = $_POST["data"];
    $data = json_decode($data);
    // print_r($data);
    $sql = "SELECT * FROM register WHERE firstName='$data->firstName' AND phone='$data->phone'";
    $result = $conn -> query($sql);
    if ($result -> num_rows > 0) {

        while ($row = $result -> fetch_assoc()) {
            switch ($row['stat']) {
                case '0':
                    $stat = 'Pending';
                    break;
                case '1':
                    $stat = 'Checked In';
                    break;
                case '2':
                    $stat = 'Checked Out';
                    break;
                case '3':
                    $stat = 'Checked Out';
                    break;
            }
        }
        echo $stat;
    }
    // $sql = "UPDATE register SET stat = 1 WHERE id=$id";
    // print_r($result);
    // mysqli_free_result($result);
?>