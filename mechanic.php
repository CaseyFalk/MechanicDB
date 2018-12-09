<!DOCTYPE html>
<html>

    <head>
        <title>Mechanic</title>
    </head>

    <body style="text-align: center;">
        <h1>Mechanic Manager</h1>

        Please enter the information below:

        <form action="/mechanicadded.php"  method="get">
            Mechanic First Name:<br>
            <input type="text" name="firstname">
            <br>
            Mechanic Last Name:<br>
            <input type="text" name="lastname">
            <br>
            <input type="submit" value="Hire">
        </form>

        <form action="/mechanicdeleted.php"  method="get">
            Mechanic ID:<br>
            <input type="text" name="id">
            <br>
            <input type="submit" value="Fire">
        </form>

    </body>

</html>