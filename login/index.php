
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>

<body>
    <h3>Borsos Attila Máté - EFMG5L</h3>
    <div>
        <form action="index.php" method="post">
            <label>
                <h1>Fill out the fields below to sign in</h1>
            </label><br>
            <br>
            <input type="text" name="username" placeholder="Enter your email"><br>
            <br>
            <br>
            <input type="password" name="password" placeholder="Enter your password"><br>
            <br>
            
            <input type="submit" name="login" value="Sign in" class="login"><br>
        </form>
    </div>
    <?php
    include("database.php");
    include("decode.php");
    include("colors.php");

    echo "<div class='szepdoboz'>";
    if (isset($_POST["login"])) {

        if (!empty($_POST["username"]) && !empty($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            if (array_key_exists($username, $passwords)) {

                if ($passwords[$username] == $password) {
                    echo "Login successful<br>";
                    $sql = "SELECT * FROM tabla WHERE username = '{$username}'";
                    $result = mysqli_query($conn, $sql);
                    $secret = mysqli_fetch_assoc($result)["Titkos"];
                    $color = getSecretColor($secret);
                } else {
                    echo "Incorrect username or password";
                    echo ("<script>setTimeout(function(){location.href='https://www.police.hu/'} , 3000);</script>");
                }
            } else {
                echo "No user found";
            }
        } else {
            echo "Invalid login, please try again<br>";
        }
    }
    echo "</div>";

    mysqli_close($conn);
    ?>
    <style>
        div {
            background-color: <?php echo $color; ?>;
        }
    </style>
</body>

</html> 