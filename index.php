<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Booking Form 1</title>
</head>

<?php

$nameErr = $emailErr = $mobileErr = $adultsErr = $childrenErr = $petsErr = $datesErr = "";
$name = $email = $mobile = $adults = $children = $pets = $dates = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $nameErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["phone"])) {
        $mobileErr = "Contact number is required";
    } else {
        $mobile = test_input($_POST["phone"]);
        if (!preg_match('/^[0-9]{11}+$/', $mobile)) {
            $mobileErr = "Invalid contact number";
        }
    }

    if (empty($_POST["adults"])) {
        $adults = "Please select how many adults";
    } else {
        $adultsErr = test_input($_POST["adults"]);
    }

    if (empty($_POST["children"])) {
        $children = "Please select how many children";
    } else {
        $childrenErr = test_input($_POST["children"]);
    }

    if (empty($_POST["pets"])) {
        $pets = "Please select how many pets";
    } else {
        $petsErr = test_input($_POST["pets"]);
    }

    if (empty($_POST["dates"])) {
        $dates = "Please enter arrival and check-out date";
    } else {
        $datesErr = test_input($_POST["dates"]);
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<body>
    <header class="container">
        <div class="nav">
            <a href="#"><img class="logo" src="./images/tent.png" alt="company logo" width="170"></a>
            <h1>Booking<br>
                <span class="paragraph">Send us a message with your dates and any questions</span>
            </h1>
        </div>

        <div class="bodycontainer">
            <div>
                <h2>Contact Form</h2>
                <br>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <!--name-->
                    Full name<br><input class="make" type="text" name="name" placeholder="eg Mabel Norris"><span class="error">* <?php echo $nameErr; ?></span><br>
                    <!--email-->
                    Email address<br><input class="make" type="text" name="email" placeholder="eg norris@google.co.uk"><span class="error">* <?php echo $emailErr; ?><br>
                        <!--contact number-->
                        Contact number<br><input class="make" type="tel" id="phone" name="phone" placeholder="+4478812318"><span class="error">* <?php echo $mobileErr; ?><br><br>
                            <!--adults/children/pets-->
                            <div class="radio">
                                Adults<br><input type="radio" name="adults" value="1">1
                                <input type="radio" name="adults" value="2">2
                                <input type="radio" name="adults" value="3+">3+<span class="error">* <?php echo $adultsErr; ?><br><br>
                                    Children (17 and under)<br><input type="radio" name="children" value="1">1
                                    <input type="radio" name="children" value="2">2
                                    <input type="radio" name="children" value="3+">3+<span class="error">* <?php echo $childrenErr; ?><br><br>
                                        Pets<br><input type="radio" name="pets" value="1pet">1
                                        <input type="radio" name="pets" value="2pets">2
                                        <input type="radio" name="pets" value="more than 3 pets">3+<span class="error">* <?php echo $petsErr; ?>
                            </div>
                            <br>
                            <!--dates-->
                            Dates (from and until)<br><input class="make" name="dates" rows="5" cols="5" placeholder="eg dd/mm/yyyy until dd/mm/yyyy"><span class="error">* <?php echo $datesErr; ?><br>
                                <!--comment-->
                                Comments<br><textarea class="make" name="comment" rows="5" cols="5" placeholder="Hi there! We have a small party of 6 adults and 4 children"></textarea><br>
                                <!--submit-->
                                <input class="button" type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>

        <?php
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $mobile;
        echo "<br>";
        echo $adults;
        echo "<br>";
        echo $children;
        echo "<br>";
        echo $pets;
        echo "<br>";
        echo $dates;
        echo "<br>";
        echo $comment;
        ?>

</body>

</html>
