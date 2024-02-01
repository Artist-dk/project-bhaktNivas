
<?php
    $conn = mysqli_connect("localhost","root","","bnRegister");
    if (!$conn) {
      die("Connection failed: ".mysqli_connect_error());
    }
    $sql = "SELECT * FROM register ORDER BY id DESC";
    $result = $conn -> query($sql);
    // print_r($data);
    // print_r($result);
    if($result -> num_rows > 0) {
        // print_r($result -> fetch_assoc());
        $el =  '<table><tbody><tr>
        <th>EDIT</th>
        <th>Sr. No.</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Mob. No.</th>
        <th>Checkin</th>
        <th>AC</th>
        <th>Status</th>
        </tr>
        ';
        $i = 1;
        while($row = $result -> fetch_assoc()) {
            $el .= "<tr> <td class='cell'><button class='btn-edit' data-id=".$row['id'].">Edit</button></td>";
            $el .= "<td class='cell'>".$i++;
            $el .= "</td><td class='cell'>".$row['firstName'];
            $el .= "</td><td class='cell'>".$row['lastName'];
            $el .= "</td><td class='cell'>".$row['phone'];
            $el .= "</td><td class='cell'>".$row['checkin'];
            $el .= "</td><td class='cell'>";
            $el .= ($row['ac']=='1')?"Yes":"-";
            $el .= "</td><td class='cell'>";
            switch ($row['stat']) {
                // 0 = confirm
                // 1 = checkout
                // 2 = delete
                // 3 = deleted
                case '0':
                    $el.="<button class='btn-stat conf' data-id=".$row['id']." data-stat='0'>Confirm</button>";
                    break;
                
                case '1':
                    $el.="<button class='btn-stat check' data-id=".$row['id']." data-stat='1'>Checkout</button>";
                    break;
                
                case '2':
                    $el.="<button class='btn-stat del' data-id=".$row['id']." data-stat='2'>Delete</button>";
                    break;
                    
                default:
                    $el.="Deleted";
                    break;
            };
            $el .="</td></tr>";
            // echo "id: ".$row['id']." - Name: ".$row['firstname']." ".$row['lastname']."<br>";
        }  
        $el .=  '</tbody></table>';
        echo($el);
    } else {
        echo "No result";
    }
    mysqli_free_result($result);
?>