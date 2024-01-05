<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="otp.php"  method="POST">
    <h1>Find your password..Enter email address</h1>
    <input type="text" name="email">
    <input type="radio" name="usertype" value="admin">Admin
    <input type="radio" name="usertype" value="customer">User
    <input type="submit" value="Next">
    <div id="loader" class="show">
                <div class="loader"></div>
            </div>

</form>
</body>
</html>