
<?php
    $conn = mysqli_connect("localhost","root","","bnRegister");
    if (!$conn) {
      die("Connection failed: ".mysqli_connect_error());
    }
    $data = $_POST["data"];
    $data = json_decode($data);

    switch ($data->stat) {
      case '0':
        $sql = "UPDATE register SET stat = 1 WHERE id=$data->id";
        break;
      case '1': 
        $sql = "UPDATE register SET stat = 2 WHERE id=$data->id";
        break;
      case '2': 
        $sql = "UPDATE register SET stat = 3 WHERE id=$data->id";
        break;
    }
    $id = $data->id;
    $stat = $data->stat;
    print_r($stat);
    // $sql = "UPDATE register SET stat = 1 WHERE id=$id";
    $result = $conn -> query($sql);
    // print_r($result);
    // mysqli_free_result($result);
?>