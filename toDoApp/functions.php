
<?php

//This is for "DONE" submit button
function deleteOnClick() {
    if (isset($_POST['del'])) {
        $servername = "localhost"; 
        $username = "root";
        $password = "2019";
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
        }
        catch (PDOExeception $e) {
            echo $sql . "<br>" . $e->getMessage(); 
        }
    }
}


//This is for the text field
function insertOnClick() {
    if ( !empty($_POST["item"]) && isset($_POST["item"])) {
        //Validating string 
        function validateItem($item) {
            $item = trim($item);
            $item = stripslashes($item);
            $item = htmlspecialchars($item);
            // $item = trim(stripslashes(htmlspecialchars($item)));
            return $item;
        }
        $item = validateItem($_POST["item"]);
            //Inserting text field value uinto database
            $servername = "localhost";
            $username = "root";
            $password = "2019";
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
        }    
}



?>