<!DOCTYPE html>
<html>

    <head>
        <title>Mechanic</title>
    </head>

    <body style="text-align: center;">

        <?php echo $_GET["firstname"]; ?> has been hired as a mechanic!<br>

        <?php

            $servername = "localhost";
            $username = "root";
            $password = "admin";
            $dbname = "mechanicdb";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $fname = $_GET["firstname"];
            $lname = $_GET["lastname"];

            //Adds the mechanic to the mechanic table.
            $sql = "INSERT INTO mechanic(mechanic_fname, mechanic_lname) VALUES ('" . $fname . "', '" . $lname . "')";
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
