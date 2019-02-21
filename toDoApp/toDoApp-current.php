
<?php

$servername = "localhost";
$username = "root";
$password = "";

echo "<table>";
try {
    $conn = new PDO("mysql:host=$servername;dbname=toDoApp", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, task, progress FROM list"); 
    $stmt->execute();

    // set the resulting array to associative
    $appList = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    
    var_dump($appList);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";


?>