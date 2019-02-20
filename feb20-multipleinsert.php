
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     // begin the transaction
     $conn->beginTransaction();
     // our SQL statements

     $conn->exec("INSERT INTO myemployees (firstname, lastname, email) 
     VALUES ('Mike', 'Bow', 'john@example.com')");
     $conn->exec("INSERT INTO myemployees (firstname, lastname, email) 
     VALUES ('Mary', 'No', 'mary@example.com')");
     $conn->exec("INSERT INTO myemployees (firstname, lastname, email) 
     VALUES ('Jon', 'Snow', 'julie@example.com')");


    $last_id = $conn->lastInsertId();
    echo "New record created successfully. Last inserted ID is: " . $last_id;


    echo "New records created successfully";
     // commit the transaction
     $conn->commit();
}
 catch(PDOException $e)
     {
     // roll back the transaction if something failed
     $conn->rollback();
     echo "Error: " . $e->getMessage();
     }
 
 $conn = null;
?>