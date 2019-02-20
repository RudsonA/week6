
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

echo "<table>";
try {   
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM myemployees"); 
    $stmt->execute();
    // global $db;

    // $query = $db->prepare('SELECT * FROM myemployees');
    // $query->execute();

    // set the resulting array to associative
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $result = $stmt->fetchAll();


foreach( $result as $row ) {
    echo "<tr> <td>" . $row['firstname'] . " ";
    echo $row['lastname'] . "</td></tr>";
}

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

echo "</table>";

$conn = null;

echo "<pre>";
var_dump($result);
echo "</pre>";
?> 