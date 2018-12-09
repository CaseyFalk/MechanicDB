<!DOCTYPE html>
<html>

    <head>
        <title>Create an Appointment</title>
    </head>

    <body>
        <h1 style="text-align:center">Please fill out your information:</h1>

        <form action="/appointmentmade.php"  method="get" style="text-align:center">
            First Name:<br>
            <input type="text" name="firstname">
            <br>
            Last Name:<br>
            <input type="text" name="lastname">
            <br>
            Car Make:<br>
            <input type="text" name="cmake">
            <br>
            Car Model:<br>
            <input type="text" name="cmodel">
            <br>
            Car VIN:<br>
            <input type="text" name="cvin">
            <br>
            Car Year:<br>
            <input type="text" name="cyear">
            <br>
            Appointment Date:<br>
            <input type="date" name="date">
            <br>
            <input type="submit" value="Submit">
        </form> 

    </body>
</html>
