<?php
// For Xampp Localhost
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "myDB";
 
//For Socitcloud
//$servername = "localhost";
//$username = "webprogmi221";
//$password = "g_6bCitLu.ljMK*m";
//$dbname = "webprogmi221";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id , name, email, website, comment, gender FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. " " . $row["website"]. " " . 
        $row["comment"]. $row["gender"]. "     " . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>