

<?php include "connect.php"; ?>

<?php

$servername = "localhost";
$username = "root";
$password = "";

echo "<table>";
try {
    $conn = new PDO("mysql:host=$servername;dbname=toDoApp", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // foreach ($appList as $a) {
    //     echo "<tr>";
    //     echo "<td>" . $a['task'] . "</td>";
    //     echo  "<td> <form method='post' action=''> <input hidden name='del' value='" . $a['id'] . "'> <input type='submit' value='DONE'> </form>" . "</td>"; 
    //     echo "</tr>";
    // }
    
     
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    // echo "</table>";
    

    if (isset($_POST['del'])) {
        $servername = "localhost"; 
        $username = "root";
        $password = "";
        $dbname = "todoapp"; 

        echo $_POST['del'];
        $id = $_POST['del'];

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // sql to delete a record
            $sql = "DELETE FROM list WHERE id=$id";

             // use exec() because no results are returned
            $conn->exec($sql);
            echo "Record deleted successfully";

            //Update page function
            // header("Refresh:0");
            
        }
        catch (PDOExeception $e) {
            echo $sql . "<br>" . $e->getMessage(); 
        }
    }
    
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

    
    ?>