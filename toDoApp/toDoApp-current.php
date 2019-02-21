
<?php 

include "connect.php"; 
include "functions.php"; 

echo "<table>";
        
deleteOnClick();

$stmt = $conn->prepare("SELECT id, task, progress FROM list"); 
$stmt->execute();

// set the resulting array to associative
$stmt->setFetchMode(PDO::FETCH_ASSOC); 
$appList = $stmt->fetchAll();

foreach ($appList as $a) {
    echo "<tr>";
    echo "<td>" . $a['task'] . "</td>";
    echo  "<td> <form method='post' action=''> <input hidden name='del' value='" . $a['id'] . "'> <input type='submit' value='DONE'> </form>" . "</td>"; 
    echo "</tr>";
}

echo "</table>";

$conn = null; 
    ?>