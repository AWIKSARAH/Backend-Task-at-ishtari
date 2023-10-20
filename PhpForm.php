<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Name: <input type="text" name="name" required><br>
        E-mail: <input type="text" name="email" required><br>
        <input type="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];

        if (empty($name)) {
            echo "The name field is required.";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "The email address is not valid.";
        } else {
            echo "Your Name is " . $name . "<br> Your Email: " . $email . "";
        }
    }
    ?>
</body>

</html>