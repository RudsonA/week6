
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
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $appList = $stmt->fetchAll();
    
    foreach ($appList as $a) {
        echo "<tr>";
        echo "<td>" . $a['task'] . "</td>";
        echo  "<td>" . "<form method='post' action=''>" . "<input hidden value=".$a['id']."> <input type='submit' value='DONE'> </form>" . "</td>"; 
        echo "</tr>";
    }

    if ($_POST) {
        $servername = "localhost"; 
        $username = "root";
        $password = "";
        $dbname = "todoapp"; 

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
               // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    $sql = "DELETE FROM MyGuests WHERE id=3";

        }
        catch (PDOExeception $e) {
            echo $sql . "<br>" . $e->getMessage(); 
        }

        $conn = null; 
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";


?>