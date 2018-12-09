<!DOCTYPE html>
<html>

    <head>
        <title>Appointment</title>
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

            $fname = $_GET["firstname"];
            $lname = $_GET["lastname"];
            $cmake = $_GET["cmake"];
            $cmodel = $_GET["cmodel"];
            $cvin = $_GET["cvin"];
            $cyear = $_GET["cyear"];
            $date = $_GET["date"];

            #Picks a random mechanic from the mechanic table to service the car. If no mechanic is in the database, the appointment will not be made.
            $getmechanicid = "SELECT mechanic_id FROM mechanic ORDER BY RAND() LIMIT 1";
            $result = $conn->query($getmechanicid);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $mechanicid = $row["mechanic_id"];
                }
            } else {
                echo "No mechanics available!";
                exit();
            }
            
            //Inserts the car into the car table using information given.
            $sql = "INSERT INTO car (car_vin, car_make, car_model, car_year) VALUES ('" . $cvin . "', '" . $cmake . "', '" . $cmodel . "', '" . $cyear . "')";
            if ($conn->query($sql) === TRUE) {
                $carid = $conn->insert_id;
                echo "";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            //Same with the customer.
            $sql2 = "INSERT INTO customer (cus_fname, cus_lname) VALUES ('" . $fname . "', '" . $lname . "')";
            if ($conn->query($sql2) === TRUE) {
                $customerid = $conn->insert_id;
                echo "";
            } else {
                echo "Error: " . $sql2 . "<br>" . $conn->error;
            }

            //Uses the last auto-incremented IDs for car and customer tables to add them to the appointment, and uses the random mechanic ID found earlier.
            $sql3 = "INSERT INTO appointment (appt_date, car_id, mechanic_id, cust_id) VALUES ('" . $date . "', '" . $carid . "', '" . $mechanicid . "', '" . $customerid . "')";
            if ($conn->query($sql3) === TRUE) {
                echo "";
            } else {
                echo "Error: " . $sql3 . "<br>" . $conn->error;
            }

            echo "Your appointment has been created! <br>";
            echo "Thank you " . $_GET["firstname"] . ".<br>";
            echo "Your appointment is on " . $_GET["date"];
        ?>

        <form style="text-align: center;" action="/index.php">
            <button>Back</button>
        </form>

    </body>
</html>
