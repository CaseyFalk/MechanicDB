<!DOCTYPE html>
<html>

    <head>
        <title>Parts</title>
    </head>

    <body style="text-align: center;">

        <?php echo $_GET["name"]; ?> has been added to the list of parts.<br>

        <?php

            $servername = "localhost";
            $username = "root";
            $password = "admin";
            $dbname = "mechanicdb";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $name = $_GET["name"];
            
            //Same as the script to add mechanics. 
            $sql = "INSERT INTO parts(part_name) VALUES ('" . $name . "')";
            if ($conn->query($sql) === TRUE) {
                $lastid = $conn->insert_id;
                echo "ID: " . $lastid . "<br>"; 
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
        ?>

        <form style="text-align: center;" action="/index.php">
            <button>Back</button>
        </form>

        

    </body>
</html>
