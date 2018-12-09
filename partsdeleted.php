<!DOCTYPE html>
<html>

    <head>
        <title>Parts</title>
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
            
            //Same as the script to delete mechanics. Checks to see if the part exists within the table, and acts accordingly.
            $sql1 = "SELECT part_name FROM parts WHERE part_id = '" . $id . "'";
            $result = $conn->query($sql1);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "You have deleted " . $row["part_name"].  "<br>";
                }
            } else {
                echo "No part with that ID found.";
            }

            $sql = "DELETE FROM parts WHERE part_id = '" . $id . "'";
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