
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employees";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO myemployees (firstname, lastname, email) 
    VALUES (:firstname, :lastname, :email)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);

    $firstnameA = ["Mike", "Judah", "Nashia"];
    $lastnameA = ["killer", "Lion", "Magical"];
    $emailA = ["jvesju@gmail.com", "love@ex.com", "opb@one.com"];

    for($x = 0; $x < 3; $x++) {
        $firstname = $firstnameA[$x];
        $lastname = $lastnameA[$x];
        $email = $emailA[$x];
        $stmt->execute();
    }
    // insert a row
    // $firstname = "Naurto";
    // $lastname = "Doe";
    // $email = "john@example.com";
    // $stmt->execute();

    // // insert another row
    // $firstname = "Nami";
    // $lastname = "No-name";
    // $email = "mary@example.com";
    // $stmt->execute();

    // // insert another row
    // $firstname = "Julie";
    // $lastname = "Dooley";
    // $email = "julie@example.com";
    // $stmt->execute();

      echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>
