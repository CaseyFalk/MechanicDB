<!DOCTYPE html>
<html>

    <head>
        <title>Parts</title>
    </head>

    <body style="text-align: center;">
        <h1>Part Manager</h1>

        Please enter the information below:

        <form action="/partsadded.php"  method="get">
            Part Name:<br>
            <input type="text" name="name">
            <br>
            <input type="submit" value="Add Part">
        </form>

        <form action="/partsdeleted.php"  method="get">
            Part ID:<br>
            <input type="text" name="id">
            <br>
            <input type="submit" value="Remove Part">
        </form>

    </body>

</html>