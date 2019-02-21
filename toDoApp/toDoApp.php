
<form action="" method="post">
    <input type="text" name="item" placeholder="Enter to do item"> 
    <input type="submit" value="Add">
</form>

<?php


if ( !empty($_POST["item"]) && isset($_POST["item"])) {
    //Validating string 
    $item = $_POST["item"];
        function validateItem($item) {
            // $item = trim($item);
            // $item = stripslashes($item);
            // $item = htmlspecialchars($item);
            $item = trim(stripslashes(htmlspecialchars($item)));
            return $item;
        }
        validateItem($item); 
        
        //Inserting text field value uinto database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "todoapp";
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO list (task, progress)
            VALUES ('$item', 'Incomplete')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
        
        $conn = null;
    }


include "toDoApp-current.php";

?>
