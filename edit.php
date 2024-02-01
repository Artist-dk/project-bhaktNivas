
<?php
    $conn = mysqli_connect("localhost","root","","bnRegister");
    if (!$conn) {
      die("Connection failed: ".mysqli_connect_error());
    }
    $data = $_POST['data'];
    $data = json_decode($data,true);    
$errors = [];


$id=trim($data['id']);

$sql = "SELECT * FROM register WHERE id = $id ORDER BY id DESC";
$result = $conn -> query($sql);
// print_r($data);
// print_r($result);
if($result -> num_rows > 0) {
    // print_r($result -> fetch_assoc());
    $el =  '';
    $i = 1;
    while($row = $result -> fetch_assoc()) {
        $el .= '
        <div class="f-box fa-box">
            <div class="f-header">
                <div class="s"></div>
                <div class="icon icon-a">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="f-body ">
                <div class="page">
                    <p>Attach Bathroom, AC and Non AC Rooms</p>
                    <form>
                        <div class="form-cont">
                            <div>
                                <div class="input-box">
                                    <label for="firstName">First name</label>
                                    <input type="text" placeholder="First name" name="firstName" autocomplete="off" value="';
                                    $el .= $row['firstName'];
                                    $el .= '" >';
                                    $el .= '
                                </div>
                            </div>
                            <div>
                                <div class="input-box">
                                    <label for="lastName">Last name</label>
                                    <input type="text" placeholder="Last name" name="lastName" autocomplete="off" value="';
                                    $el .= $row['lastName'];
                                    $el .= '" >';
                                    $el .= '
                                </div>
                            </div>
                            <div>
                                <div class="input-box">
                                    <label for="phone">Mob. No.</label>
                                    <input type="text" name="phone" placeholder="Mob. No." autocomplete="off" value="';
                                    $el .= $row['phone'];
                                    $el .= '" >';
                                    $el .= '
                                </div>
                            </div>
                            <div>
                                <div class="input-box">
                                    <label for="phone">Email ID</label>
                                    <input type="text" name="phone" placeholder="Adhar no." autocomplete="off" value="';
                                    $el .= $row['email'];
                                    $el .= '" >';
                                    $el .= '
                                </div>
                            </div>
                            <div>
                                <div class="input-box">
                                    <label for="checkin">Check In</label>
                                    <input type="date" name="checkin" placeholder="Mob. No." autocomplete="off" value="';
                                    $el .= $row['checkin'];
                                    $el .= '" >';
                                    $el .= '
                                </div>
                            </div>
                            <div>
                                <div class="input-box">
                                    <label for="checkin">Check Out</label>
                                    <input type="date" name="checkin" placeholder="Mob. No." autocomplete="off" value="';
                                    $el .= $row['checkout'];
                                    $el .= '" >';
                                    $el .= '
                                </div>
                            </div>
                            <div>
                                <div class="input-box">
                                    <label for="phone">Adhar No.</label>
                                    <input type="text" name="phone" placeholder="Adhar no." autocomplete="off" value="';
                                    $el .= $row['adharNo'];
                                    $el .= '" >';
                                    $el .= '
                                </div>
                            </div>
                            <div>
                                <div class="input-box">
                                    <label for="phone">Room No.</label>
                                    <input type="text" name="phone" placeholder="Room No." autocomplete="off" value="';
                                    $el .= $row['roomNo'];
                                    $el .= '" >';
                                    $el .= '
                                </div>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label for="ac">AC</label>
                            <input type="checkbox" name="ac">
                        </div>
                        <div class="submit-cont">
                            <div class="input-box">
                                <input type="submit" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="f-footer">
                <p>Aaisaheb Bhakt Nivas</p>
            </div>
        </div> ';
        // echo "id: ".$row['id']." - Name: ".$row['firstname']." ".$row['lastname']."<br>";
    }  
    // $el .=  '</tbody></table>';
    echo($el);
} else {
    echo "No result";
}
mysqli_free_result($result);

?>