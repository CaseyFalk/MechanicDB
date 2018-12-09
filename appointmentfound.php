<!DOCTYPE html>
<html>

    <head>
        <title>Appointment Found</title>
    </head>

    <body style="text-align: center;">

        <?php

        $servername = "localhost";
        $username = "root";
        $password = "admin";
        $dbname = "mechanicdb";

        $firstname = $_GET["firstname"];
        $lastname = $_GET["lastname"];

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //Using the first and last name given, finds the customer ID associated with the name and then finds the date associated with the appointment using the customer ID.
        $sql = "SELECT appt_date FROM appointment WHERE cust_id = (SELECT cust_id FROM customer WHERE cus_fname = '" . $firstname . "' AND cus_lname = '" . $lastname . "')";
        $result = $conn->query($sql);

        //Lists all of the appointments the user currently has.
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Your appointment is at: " . $row["appt_date"].  "<br>";
            }
        } else {
            echo "No appointment found.";
        }
        ?> 
        
        <form style="text-align: center;" action="/index.php">
            <button>Back</button>
        </form>

    </body>
</html>
