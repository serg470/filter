 <?php
$servername = "localhost";
$username = "rkn";
$password = "2cw9m6";
$dbname = "rkn";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$IP = $_POST['IP'];
$DOMAIN =$_POST['Domain'];

$sqlip = "SELECT * FROM ip_addresses WHERE ip=INET_ATON('$IP')";
$resultip = $conn->query($sqlip);

$sqld = "SELECT * FROM `domain` WHERE domain LIKE '%$DOMAIN%'";
$resultd = $conn->query($sqld);

if ($IP <> "") {
if ($resultip->num_rows > 0) {
    // output data of each row
    while($row = $resultip->fetch_assoc()) {
     echo "IP " . long2ip($row["ip"]) . " заблокирован! <br>";
#        echo "ip: " . long2ip($row["ip"]) . "<br>";
    }
}
  else {
echo "IP не заблокирован!";
   }
}

if ($DOMAIN <> "") {

if ($resultd->num_rows > 0) {
    // output data of each row
    while($row = $resultd->fetch_assoc()) {
#  echo "!";
        echo "Domain: " . $row["domain"] . "<br>";
   }
}
 else {
    echo "Ничего не нашлось!";
}
}
$conn->close();
?> 