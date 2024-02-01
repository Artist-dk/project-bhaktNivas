<?php
    $conn = mysqli_connect("localhost","root","","bnRegister");
    if (!$conn) {
      die("Connection failed: ".mysqli_connect_error());
    }
    $id = $_POST["data"];
    $sql = "UPDATE register SET stat = 3 WHERE id=$id";
    $result = $conn -> query($sql);
    // print_r($result);
    // mysqli_free_result($result);
?>