<!DOCTYPE html>
<html>

    <head>
        <title>Mechanic</title>
    </head>

    <body style="text-align: center;">

        <?php

            $servername = "localhost";
            $username = "root";
            $password = "admin";
            $dbname = "mechanicdb";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $id = $_GET["id"];
            
            //Finds the name associated with the ID given, then, depending on if that mechanic exists or not, fires them or lets the user know they don't exist.
            $sql1 = "SELECT mechanic_fname FROM mechanic WHERE mechanic_id = '" . $id . "'";
            $result = $conn->query($sql1);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "You have fired " . $row["mechanic_fname"].  "<br>";
                }
            } else {
                echo "No mechanic with that ID found.";
            }

            $sql = "DELETE FROM mechanic WHERE mechanic_id = '" . $id . "'";
            if ($conn->query($sql) === TRUE) {
                echo "";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
        ?>

        <form style="text-align: center;" action="/index.php">
            <button>Back</button>
        </form>

    </body>
</html>