<?php
require_once 'connec.php';


$pdo = new PDO(DSN, USER, PASS);

$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);


$query = "INSERT INTO friend (firstname,lastname) VALUES (:firstname, :lastname)";
$statement = $pdo->prepare($query);


$statement->bindValue(":firstname", $firstname, PDO::PARAM_STR);
$statement->bindValue(":lastname", $lastname, PDO::PARAM_STR);

$statement->execute();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>


        <form action="" method="post">
            <label for="firstname">First name : </label>
            <input type="text" id="firstname" name="firstname">

            <label for="lastname"> LastName : </label>
            <input type="text" id="lastname" name="lastname">

            <button>ENvoyer</button>

        </form>

        <?php

        $query = "SELECT * FROM friend";

        $statement = $pdo->query($query);
        $friends = $statement->fetchAll(); ?>
        <ul>
            <?php foreach ($friends as $friend) { ?>
                <li>
                <?php echo $friend['firstname'] . ' ' . $friend['lastname'];
            } ?>
                </li>
        </ul>
</body>

</html>